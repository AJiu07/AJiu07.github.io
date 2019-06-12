class Store {
    get : function(){
        if (this[src]) {
            return this[src]
        } else {
            $.get(src,(res)=>{
                this[src] = JSON.parse(res)
                retrun this[src]
            })
        }
    }

    getInstance: function()=>{
        if (this.instance) {
            return this.instance
        } else {
            this.instance = new Store();
            return this.instance;
        }
    }
}
new Store
var store = Store().getInstance();
