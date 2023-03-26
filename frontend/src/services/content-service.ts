import axios from 'axios';
import { $config } from './config-service';



class ContentService {
  private _baseUrl = process.env.BASE_URL;
  private _data: any;

  
  public async load(){

    console.log("cms-service load all");
    const config = Object.assign({}, {headers:$config.config.headers}) as any;

    const url = '/cockpit/api/singletons/get/landing';
    this._data = (await axios.get(url, config)).data;

    console.log("got data", this._data);
    return this._data;    
  }


  get data() {
    return this._data;
  }

}

//
// services start with $
export const $content = new ContentService();