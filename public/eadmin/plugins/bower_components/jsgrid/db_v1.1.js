(function() {

    var db = {

        loadData: function(filter) {
            return $.grep(this.foodCategories, function(client) {
                return (!filter.id || client.id === filter.id)
                    && (!filter.name || client.name.indexOf(filter.name) > -1)
                    && (!filter.description || client.description === filter.description)
                    && (!filter.archive || client.archive === filter.archive)
                    && (filter.Married === undefined || client.Married === filter.Married);
            });
        },

        insertItem: function(insertingClient) {
            this.clients.push(insertingClient);
        },

        updateItem: function(updatingClient) { },

        deleteItem: function(deletingClient) {
            var clientIndex = $.inArray(deletingClient, this.clients);
            this.clients.splice(clientIndex, 1);
        }

    };

    window.db = db;


    var hotel = {

        loadData: function(filter) {
            return $.grep(this.data, function(client) {
                return (!filter.id || client.id === filter.id)
                    && (!filter.name || client.name.indexOf(filter.name) > -1)
                    && (!filter.category || client.category === filter.category)
                    && (!filter.archive || client.archive === filter.archive);
            });
        },

        insertItem: function(insertingClient) {
            this.clients.push(insertingClient);
        },

        updateItem: function(updatingClient) { },

        deleteItem: function(deletingClient) {
            var clientIndex = $.inArray(deletingClient, this.clients);
            this.clients.splice(clientIndex, 1);
        }

    };

    window.hotel = hotel;

    /***********************************************************************/
    var proposedForms = {

        loadData: function(filter) {
            return $.grep(this.data, function(client) {
                return (!filter.ref_num || client.ref_num === filter.ref_num)
                    && (!filter.person_name || client.person_name.indexOf(filter.person_name) > -1)
                    && (!filter.adults || client.adults == filter.adults)
                    && (!filter.childs || client.childs == filter.childs)
                    && (!filter.infants || client.infants == filter.infants)
                    && (!filter.archive || client.archive === filter.archive);
            });
        },

        insertItem: function(insertingClient) {
            this.clients.push(insertingClient);
        },

        updateItem: function(updatingClient) { },

        deleteItem: function(deletingClient) {
            var clientIndex = $.inArray(deletingClient, this.clients);
            this.clients.splice(clientIndex, 1);
        }

    };

    window.proposedForms = proposedForms;


}());