export default class Ajax{
    constructor(){
    }

    async SendRequest(url, options){
        try{
            const response = await fetch(url, options);
            if(response.ok){
                return await response.json();
            }
            return null;
        }catch(err){
            throw err;
        }
    }
}