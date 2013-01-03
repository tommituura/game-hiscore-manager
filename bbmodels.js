"use strict";

gamemanager.models = {};
gamemanager.collections = {};
gamemanager.models.Game = Backbone.Model.extend({
    validate: function (attributes) {
        if (attributes.name.length === 0) {
            return "The Name of the Game must be longer than zero!";
        } 
    }
});
gamemanager.collections.GameCollection = Backbone.Collection.extend({
    url: "http://ttuura.users.cs.helsinki.fi/game-hiscore-manager/games/",
    model: gamemanager.models.Game
});
