<template>
  <div class="main">
    <!-- HEADER INTRO -->
    <header class="bg-img header" ref="intro">
                <nav class="navbar navbar-default navbar-vira">
                    <div class="container">
                        <div class="navigation-bar">
                            <div class="row">
                                <div class="col-xs-11 text-right">
                                    <div class="menu m">
                                        <a href="#"><span class="ion-navicon _ion-android-menu"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                <div class="container">
                    <div class="row">
                        <div class="intro-box">
                            <div class="intro">
                                <h1>{{content.intro_title}}</h1>
                                <p>{{content.intro_tagline}}</p>
                                <a class="btn vira-btn" :href="content.intro_cta_link">{{content.intro_cta_text}}</a>
                            </div>
                        </div>
                    </div>
                </div>
    </header>

    <!-- BRANDING -->
    <section id="about" class="about section">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <p>
                              {{ content.intro_about }}
                            </p>
                            <img :src="content.intro_logo.path">
                            <span> </span>
                        </div>
                        
                      </div>
                </div>
            </section>

    <!-- OUR WORK -->
    <section id="workstation" class="work section">
      <div class="container">
        <h2 class="title">{{ content.ourwork_title }}</h2>
        <div id="workstation-slider" class="owl-carousel">
            <div class="item" v-for="(work,index) in content.ourwork" :key="index">
                <div class="vira-card">
                    <div class="vira-card-content">
                    </div>
                    <div class="vira-card-header">
                        <img class="img-responsive" :src="work.value.image.path">
                    </div>

                    <div class="vira-card-content">
                      <h3>{{ index+1 }}. {{ work.value.title }}</h3>
                        <p>
                          {{ work.value.content }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section> 

    <!-- CONTACT -->
    <section id="contact" class="contact section">
                <div class="container">
                    <h2 class="title">Contactez nous</h2>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="vira-card">
                                <div class="vira-card-header">
                                        <span class="fa fa-map-o" aria-hidden="true"></span>
                                </div>
                                <div class="vira-card-content">
                                    <h3>Address</h3>
                                    <p>
                                        Level 5, 25 pitt st, US
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="vira-card">
                                <div class="vira-card-header">
                                        <span class="fa fa-phone" aria-hidden="true"></span>
                                </div>
                                <div class="vira-card-content">
                                    <h3>Phone</h3>
                                    <p>
                                        +555 211 3747
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="vira-card">
                                <div class="vira-card-header">
                                        <span class="fa fa-paper-plane" aria-hidden="true"></span>
                                </div>
                                <div class="vira-card-content">
                                    <h3>Email</h3>
                                    <p>
                                        hey@themewagon.com
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="social-icons">
                                <ul>
                                    <a href="#"><li><span class="ion-social-facebook"></span></li></a>
                                    <a href="#"><li><span class="ion-social-twitter"></span></li></a>
                                    <a href="#"><li><span class="ion-social-pinterest"></span></li></a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


    <!-- FOOTER -->
    <footer class="footer">
      <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <p> {{content.footer_title}} <span class="fa fa-heart"></span> </p>
            </div>
        </div>
    </div>
    </footer>
  </div>
</template>

<style lang="scss" scoped>
.work .title{
  margin-bottom: 50px;
}
.owl-carousel{
  display: flex;
  .item{
    padding: 5px;
    width: calc( 100% / 3 - 10px );
    .vira-card .vira-card-header{
      height: 550px;
    }
  }
  @media (max-width:768px) {
    flex-direction:column;
    .item{
      width: 100%;
    }
    img{
      width: 100%;
    }
  }
}

.intro a.btn{
    white-space:normal!important;
    letter-spacing: 1px;
    padding: 15px 40px;
    background-color: rgba(51, 51, 51,.30);    
}

</style>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import { $config, $content } from "@/services";


@Component({
  components: {
  },
})
export default class Home extends Vue {

  $refs!: {
    intro: HTMLInputElement;
  };
  
  get config() {
    return $config.config;
  }

  get content() {
    return $content.data;
  }
  mounted(){
    const url = $content.data.intro_image.path;
    this.$refs.intro.style.backgroundImage = "url("+url+")";
    // if(!this.config.show_cursor){
    //   document.body.parentElement!.style.cursor = "none";
    // }
  }

}
</script>
