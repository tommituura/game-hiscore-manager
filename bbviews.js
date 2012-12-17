"use strict";

gamemanager.views = {};

gamemanager.views.ListView = Backbone.View.extend({
    el: $('#gamelist'),
    initialize: function() {
        gamemanager.collections.coll.fetch({
        success: function () {
            var data = {};
            data.gamelist = gamemanager.collections.coll.toJSON();
            $('#dataarea').html(Mustache.render($('#gamelisttemplate').html(), data));
        }
        });
    }
});

gamemanager.views.AddView = Backbone.View.extend({
    el: $('#dataarea'),
    initialize: function() {
        this.$el.html(Mustache.render($('#gameaddtemplate').html()));
    },
    events: {
        "click #add-submit": "save"
    },
    save: function(eventInformation) {
        var newgame = new gamemanager.models.Game({name: $('#add-name').val()});
        if (newgame.isValid()) {
            gamemanager.collections.coll.create( { name: newgame.get('name') } );
            new gamemanager.views.ListView();
        }
        eventInformation.preventDefault();
    }
});

gamemanager.views.MenuView = Backbone.View.extend({
    el: $('#menu'),
    events: {
        "click #addgame": "add",
        "click #listgames": "list"
    },
    add: function(eventInformation) {
        new gamemanager.views.AddView();
        eventInformation.preventDefault();
    },
    list: function(eventInformation) {
        new gamemanager.views.ListView();
        eventInformation.preventDefault();
    }
});
