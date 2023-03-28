<template>
  <transition name="slide">
    <section  class="drawer primary" :class="{open:open}" @click="onClose(false)">
      <button class="icon media-display" 
          v-if="displayClose" @click="onClose(true)" :class="{'exited': (scrollDirection > 0) }">
        ❎ <span class="hide material-icons-outlined">playlist_remove</span>
      </button>

      <div ref="container" v-if="open" class="content" @scroll="onScroll">
        <slot />
      </div>        
    </section>

  </transition>
</template>

<script lang="ts">

import { Component, Vue } from 'vue-property-decorator';
import { Watch } from 'vue-property-decorator'

@Component({
 props: {
   open:{
     default: false,
     type: Boolean
   },
   displayClose: {
     default: false,
     type: Boolean
   },
 }  
})
export default class Drawer extends Vue {
  open!:boolean;
  displayClose!:boolean;
  lastScrollTop = 50;
  scrollDirection = 0;

  //
  // helpers for typescript
  $refs!: {
    container: HTMLElement
  }  

  onScroll($event:any) {    
    const st = $event.target.scrollTop;
    //
    // downscroll code
    if (st > this.lastScrollTop){
      this.scrollDirection = 1;
    } 
    //
    // upscroll code
    else {          
      this.scrollDirection = -1;
    }

    //
    // For Mobile or negative scrolling
    this.lastScrollTop = st <= 0 ? 0 : st; 
  }
  
  @Watch('open')
  onOpenChanged(value: boolean, oldValue: boolean) {
    if(value) {
      document.body.classList.add('body-lock');
    }else{
      document.body.classList.remove('body-lock');
    }
  }



  onClose(button?:boolean){
    //
    // only quit on click button 
    if(this.displayClose && !button) {
      return;
    }

    this.$emit("close", null);
  }

}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  section.drawer {
    background-color: var(--md-theme-default-primary);
    color: var(--md-theme-default-primary-text);
    position: fixed;
    z-index: 100;
    bottom: 0;
    left:5px;
    height: calc(95vh);
    text-align: center;
    border-radius: 20px 20px 0 0;
    padding: 0 0px;    
    transform: translateY(calc(98vh));
    transition: all 200ms;     
    box-shadow: 0 0 0px 1px #ddd;
    width: calc( 100vw - 10px );
    margin-left: auto;
    margin-right: auto;

    overflow: hidden;
  }  

  .slide-enter-active, .slide-leave-active {
    transition: transform .3s ease-in-out;
  }

  .slide-enter, .slide-leave-to {
    transform: translateX(-100%);
  }

  .slide-enter-to, .slide-leave {
    transform: translateX(0);
  }

  @media print {
    section.drawer{
      box-shadow: none!important;
      height: 100vh!important;
      top:0;
      width: 100vw;
      background: white!important;
      color: black!important;
    }
    
  } 

  @media (min-width:426px) {
    section.drawer.open {
      transform: translateY(45px)!important;
    }
  }



  section.drawer .icon {
    background: transparent;
    position: absolute;
    right: 20px;
    top: 20px;
    width: 50px;
    height: 50px;
    padding-left: 5px;
    padding-right: 5px;
    color: black;
    font-size: 48px;
    font-weight: 100;
    font-family: cursive;
    border: 0;
    opacity: 1;
    transition: all 200ms;      
  }

  section.drawer .icon.exited {
    opacity: 0;
  }

  section.drawer.open {
    transform: translateY(10px);
  }
  section.drawer svg {
    width: 55px;
    margin-top: -27px;
    width: auto;
    margin-top: 10px;
    height: 55px;
    transform: translateY(-64px) translateX(0px);
  }

  section.drawer nav{
    width: 40px;
    height: 3px;
    -background: rgba(255, 255, 255,.8);
    margin: auto;
    margin-top: 8px;
    display: none;
  }
  section.drawer div.content{    
    text-align: left;
    padding: 10px 20px;              
    overflow-y: auto;
    -webkit-overflow-scrolling: touch;
    height: 100%;
    transition: all 200ms;
    scrollbar-width: none;  /* Firefox */
    background-color: #eee;

    margin: auto;
    display: flex;    
  }




  section.drawer div.content::-webkit-scrollbar {
    display: none;
  }


  section.drawer div.content h3{
    width: 100%;
    text-align: center;
    text-transform: uppercase;
    font-size: 14px;
    margin-bottom: 30px;    
  }

  section.drawer div.content  /deep/ a{
    font-weight: 600;
  }

</style>
