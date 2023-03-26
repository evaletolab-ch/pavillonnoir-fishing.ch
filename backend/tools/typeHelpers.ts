

export class TypeHelper
{

    // public static convert_digrammes(text:string):string{
    //     if(!text){
    //         return text;
    //     }
    //     let dictionary = JSON.parse(fs.readFileSync('./data/digrammes_fr.json'));
    //     let result = text;

    //     for(let val of dictionary['oe']){
    //         let correct = val.replace('oe', "œ");
    //         result = result.replace(new RegExp(val, "g"), correct);  
    //     }

    //     for(let val of dictionary['ae']){
    //         let correct = val.replace('ae', "æ");
    //         result = result.replace(new RegExp(val, "g"), correct);            
    //     }

    //     return result;
    // }

    public static super_script_html(text:string):string{
        if(!text){
            return text;
        }

        let result = text;

        result = result.replace(/(\d+h)(\d+)/g, "$1<sup>$2</sup>");
        result = result.replace(/(\d)(er?e?)\b/g, "$1<sup>$2</sup>");
        result = result.replace(/(\d)(ère?)\b/g, "$1<sup>$2</sup>");
        result = result.replace(/(\d)((e|è)me)\b/g, "$1<sup>$2</sup>");
        result = result.replace(/([V|I|X])(er?)\b/g, "$1<sup>$2</sup>");
        result = result.replace(/([V|I|X])((e|è)me)\b/g, "$1<sup>$2</sup>");

        return result;
    }

    public static insecables(text:string):string{
        if(!text){
            return text;
        }

        let result = text;

        result = result.replace(/([:!;?])/g, "&#8201;$1");
        result = result.replace(/(\()\s*&#8201;(\?)\s*(\))/g, "$1&#8201;$2&#8201;$3");
        result = result.replace(/\s&#8201;/g, "&#8201;");
        // word of two letters should not end line
        result = result.replace(/(\s\w{1,2})(\s)(\w+)/g, "$1&nbsp;$3");
       
        return result;
    }
}