const fs = require("fs");
require('dotenv').config();
const fetch = require('isomorphic-fetch');
const CockpitSDK = require("cockpit-sdk").default;

const marked = require("marked");

const DEST = process.env.API_DEST || './';


const cockpit = new CockpitSDK({
  host: process.env.API_HOST, // e.g. local docker Cockpit.
  accessToken: process.env.API_TOKEN
});

const writeFile = function(body,filename){
    return new Promise((resolve,reject)=> {
        body.pipe(fs.createWriteStream(filename)).on('close', ()=>{
          resolve();
        });
      });
}

const download = async function(uri, filename){
    const localfile = (DEST+'/assets/'+filename);
    const remotePath = `${process.env.API_HOST}${uri}`;

    console.log("downloading remote image", filename, " to local path", localfile);

    const res = await fetch(remotePath.replace('/cockpit',''));
    await writeFile(res.body,localfile);
};


function convertMdToHtml(item, key){
    item[key].fr = marked.parse(item[key].fr);
    item[key].en = marked.parse(item[key].en);

    return item;
}

function insecables(text){
    if (!text) {
        return text;
    }

    let result = text;

    // result = result.replace(/([:!;?])/g, "&#8201;$1");
    // result = result.replace(/(\()\s*&#8201;(\?)\s*(\))/g, "$1&#8201;$2&#8201;$3");
    // result = result.replace(/\s&#8201;/g, "&#8201;");
    // word of two letters should not end line
    // result = result.replace(/(\s\w{1,2})(\s)(\w+)/g, "$1&nbsp;$3");

    // result = result.replace(/\s([^\s<]+)\s*$/,'\u00A0$1');

    // replace hyphens by non breaking hyphen -> 
    // https://stackoverflow.com/questions/8753296/how-to-prevent-line-break-at-hyphens-in-all-browsers
    result = result.replace(/-/g, "&#x2011;");

    let words = result.trim().split(" ");
    if (words.length < 2){
        return result;
    }

    result = "";
    for(let i = 0; i < words.length; i++){
        result += words[i];
        if(i < words.length -2){
            result += " ";
        }

        if(i == words.length - 2){
            result += "&nbsp;"
        }

    }

    return result;
}

function convertInsecables(localized){
    localized.fr = insecables(localized.fr);
    localized.en = insecables(localized.en);
}
  

async function content(){
    try{
        const data = await cockpit.collectionGet("inventory", { limit: 200 });
        const entries = data.entries;

        let parsedItems = [];
        //
        // download image
        for (let entry of entries) {

            let parsedItem = {};

            //
            // transform to Localized form -> {en:string, fr:string}
            ['designation','aquisition','date','function','from','material','ethnicity','code','image_credits', 'detail'].forEach(key =>{
                const fr = entry[key] || "";
                const en =  entry[`${key}_en`] ? entry[`${key}_en`] : fr;
                parsedItem[key] = {
                    fr, en,
                }
            });
            
            // rename field for frontend
            parsedItem.itemId = parsedItem.code;
            delete(parsedItem.code);

            convertInsecables(parsedItem.designation);
            convertInsecables(parsedItem.from);
            convertInsecables(parsedItem.aquisition);
            convertInsecables(parsedItem.function);
            convertInsecables(parsedItem.date);

            // handle md conversion
            parsedItem = convertMdToHtml(parsedItem, "designation");
            parsedItem = convertMdToHtml(parsedItem, "from");
            parsedItem = convertMdToHtml(parsedItem, "function");
            parsedItem = convertMdToHtml(parsedItem, "detail");



            //
            // download small image
            parsedItem.image = null;
            if(entry.image && entry.image && entry.image.path) {
                const filename = /[^/]*$/.exec(entry.image.path)[0];
                await download(entry.image.path, filename);
                parsedItem.image = {
                    path: `/data/assets/${filename}`,
                }
            }


            //
            // download large image
            parsedItem.image_detail = null;
            if(entry.image_detail && entry.image_detail.path){
                const filename = /[^/]*$/.exec(entry.image_detail.path)[0];
                await download(entry.image_detail.path, filename);
                entry.image_detail.path = '/assets/'+filename;            
                parsedItem.image_detail = {
                    path: `/data/assets/${filename}`,
                }
            }

            parsedItem.displayModal = entry.displayModal;

            if(parsedItem.displayModal){
                // TODO:
                throw new Error("Not implemented");
            }


            //
            // remove null entries
            // Object.keys(entry).forEach(key => {
            //     entry[key] || delete entry[key];
            // })
            // //
            // // update json output model
            // delete entry.image.image;
            // delete entry._mby;
            // delete entry._by;
            // delete entry._id;

            parsedItems.push(parsedItem);

        }
        fs.writeFileSync(DEST+'/inventory.collection.json', JSON.stringify(parsedItems, null, 2));
        fs.writeFileSync(DEST+'/inventory.collection.raw.json', JSON.stringify(entries, null, 2));
        console.log('download content from :',process.env.API_HOST);
        console.log("save to : ",DEST+'/inventory.collection.json');
    }catch(err){
        console.error(err);
        process.exit(1);
    }

    console.log("download completed successfully");
}

content();