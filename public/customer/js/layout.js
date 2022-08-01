const IndexView = { 
    Config: {
        onNumberKey(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        },
        isEmail(email){
            return email.match( /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/ );
        },
        formatPrices(num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
        },
        toNoTag(string){
            return string.replace(/(<([^>]+)>)/ig, "");
        },
        toRemoveStringTag(string){
            return string.replace(/(<([^>]+)>(.*?)<\/([^>]+)>)/ig, ""); 
        },
        onPricesKey(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        },
    }, 
    init(){
        $(document).on('keypress', `.number-type`, function(event) {
            return IndexView.Config.onNumberKey(event);
        });
    }
};
(() => {
    IndexView.init();
    function init(){
        
    }
    init();
})();