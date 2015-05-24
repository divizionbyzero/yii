/**
 * Created by hele on 14.05.2015.
 */

(function(){
    var app = angular.module('store',[ ]);

    app.controller('StoreController',function(){
        this.products = gems;
    });
    var gems = [{
        name: "Ohoho",
        price: 7,
        description: ". . .",
        canPurchase: false,
        soldOut: false
    },
        {name: "Ehehe",
            price: 2.75,
            description: "!!!",
            canPurchase: true,
            soldOut: false
        },
        {name: "Eheeeee",
            price: 77,
            description: "!!!",
            canPurchase: true,
            soldOut: false
        }]
})();