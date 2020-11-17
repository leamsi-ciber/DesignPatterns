//old interface

function Jeep(){
    this.request = function(year, model, color){
       var price = "$US 31,000";
       var atributtes ="2018" + " "+" Grand Cherokee" + " "+ "Black";
        return  atributtes + " " +  " Precio: " + price;
    }
}

// new interface
function AdvancedJeep(){
    this.login = function(credentials){/*...*/};
    this.setYear = function(start){/*.... */};
    this.setModel = function(destination){/*.... */};
    this.calculate = function(color){var price="$US 33,000 ";
var atributtes = "2019" + " "+" Grand Cherokee" + " "+ "White";
return atributtes + " " +  " Precio: " +price;
};
}

//adapter interface

function JeepAdapter(credentials){
    var jeep = new AdvancedJeep();

    jeep.login(credentials);

    return{
        request : function(year, model, color){
            jeep.setYear(year);
            jeep.setModel(model);
            return jeep.calculate(color);
         }
    };
}

//Log helper

var log = (function(){
var log = "";
return{
    add: function (msg){log += msg + "\n";},
    show: function(){alert(log); log = "";}
}
})();

function run(){
    var jeep = new Jeep();
    var credentials = {token: "30a8-6ee1"}
    var adapter = new JeepAdapter(credentials);

    //original Jeep object and interface

    var cost = jeep.request("2018",  "Grand Cherokee", "Black");
    log.add("Jeep last year: " +" "+ cost);

    //new Jeep object with adapted interface

     cost = adapter.request("2019",  "Grand Cherokee", "White");
    
     log.add("Jeep of the year: " +" "+ cost);
     log.show();

}