! function(document, window, $) {
    "use strict";
    var Site = window.Site;
    $(document).ready(function($) {
            
        }), jsGrid.setDefaults({
            tableClass: "jsgrid-table table table-striped table-hover"
        }), jsGrid.setDefaults("text", {
            _createTextBox: function() {
                return $("<input>").attr("type", "text").attr("class", "form-control input-sm")
            }
        }), jsGrid.setDefaults("number", {
            _createTextBox: function() {
                return $("<input>").attr("type", "number").attr("class", "form-control input-sm")
            }
        }), jsGrid.setDefaults("textarea", {
            _createTextBox: function() {
                return $("<input>").attr("type", "textarea").attr("class", "form-control")
            }
        }), jsGrid.setDefaults("control", {
            _createGridButton: function(cls, tooltip, clickHandler) {
                var grid = this._grid;
                return $("<button>").addClass(this.buttonClass).addClass(cls).attr({
                    type: "button",
                    title: tooltip
                }).on("click", function(e) {
                    clickHandler(grid, e)
                })
            }
        }), jsGrid.setDefaults("select", {
            _createSelect: function() {
                var $result = $("<select>").attr("class", "form-control input-sm"),
                    valueField = this.valueField,
                    textField = this.textField,
                    selectedIndex = this.selectedIndex;
                return $.each(this.items, function(index, item) {
                    var value = valueField ? item[valueField] : index,
                        text = textField ? item[textField] : item,
                        $option = $("<option>").attr("value", value).text(text).appendTo($result);
                    $option.prop("selected", selectedIndex === index)
                }), $result
            }
        }),
        function() {
            $("#basicgrid").jsGrid({
                height: "500px",
                width: "100%",
                filtering: !0,
                editing: 0,
                sorting: !0,
                paging: !0,
                autoload: !0,
                pageSize: 15,
                pageButtonCount: 5,
                controller: db,
                fields: [{
                    name: "id",
                    title: "ID",
                    type: "number",
                    width: 50
                }, {
                    name: "name",
                    title: "Name",
                    type: "text",
                    width: 70
                }, {
                    name: "description",
                    title: "Description",
                    type: "text",
                    width: 150
                }, {
                    name: "archive",
                    title: "Deleted",
                    type: "text",
                    width: 50
                }, {
                    name: "created_at",
                    title: "Created At",
                    type: "text",
                    width: 100
                }, {
                    name: "actions",
                    title: "Actions",
                    type: "text",
                    width: 100,
                    filtering: 0,
                }, {
                    type: "control",
                    editButton: false,
                    deleteButton: false,
                    modeSwitchButton: false
                }]
            })
        }(),
        function() {
            $("#restaurantGrid").jsGrid({
                height: "500px",
                width: "100%",
                filtering: !0,
                editing: 0,
                sorting: !0,
                paging: !0,
                autoload: !0,
                pageSize: 15,
                pageButtonCount: 5,
                controller: hotel,
                fields: [{
                    name: "id",
                    title: "ID",
                    type: "number",
                    width: 25
                }, {
                    name: "name",
                    title: "Name",
                    type: "text",
                    width: 70
                }, {
                    name: "category",
                    title: "Category (*)",
                    type: "text",
                    width: 70
                }, {
                    name: "double",
                    title: "Double",
                    type: "text",
                    width: 70
                }, {
                    name: "triple",
                    title: "Triple",
                    type: "text",
                    width: 70
                }, {
                    name: "quad",
                    title: "Quad",
                    type: "text",
                    width: 70
                }, {
                    name: "quint",
                    title: "Quint",
                    type: "text",
                    width: 70
                }, {
                    name: "actions",
                    title: "Actions",
                    type: "text",
                    width: 100
                }, {
                    type: "control",
                    editButton: false,
                    deleteButton: false,
                    modeSwitchButton: false
                }]
            })
        }(),
        function() {
            $("#proposedFormsGrid").jsGrid({
                height: "500px",
                width: "100%",
                filtering: !0,
                editing: 0,
                sorting: !0,
                paging: !0,
                autoload: !0,
                pageSize: 15,
                pageButtonCount: 5,
                controller: proposedForms,
                fields: [{
                    name: "ref_num",
                    title: "ID",
                    type: "text",
                    width: 70
                }, {
                    name: "person_name",
                    title: "Name",
                    type: "text",
                    width: 70
                }, {
                    name: "adults",
                    title: "Adults",
                    type: "text",
                    width: 70
                }, {
                    name: "childs",
                    title: "Childs",
                    type: "text",
                    width: 70
                }, {
                    name: "infants",
                    title: "Infants",
                    type: "text",
                    width: 70
                }, {
                    name: "makkah_hotel",
                    title: "Makkah Hotel",
                    type: "text",
                    width: 70
                }, {
                    name: "madinah_hotel",
                    title: "Madinah Hotel",
                    type: "text",
                    width: 70
                }, {
                    name: "total_package_price",
                    title: "Total (PKR)",
                    type: "text",
                    width: 70
                }, {
                    name: "actions",
                    title: "Actions",
                    type: "text",
                    width: 100
                }, {
                    type: "control",
                    editButton: false,
                    deleteButton: false,
                    modeSwitchButton: false
                }]
            })
        }(),
        function() {
            $("#nootsGrid").jsGrid({
                height: "500px",
                width: "100%",
                filtering: !0,
                editing: 0,
                sorting: !0,
                paging: !0,
                autoload: !0,
                pageSize: 15,
                pageButtonCount: 5,
                controller: noots,
                fields: [{
                    name: "id",
                    title: "ID",
                    type: "number",
                    width: 25
                }, {
                    name: "name",
                    title: "Name",
                    type: "text",
                    width: 70
                }, {
                    name: "min_deliveries",
                    title: "Min Deliveries",
                    type: "text",
                    width: 70
                }, {
                    name: "max_deliveries",
                    title: "Max Deliveries",
                    type: "text",
                    width: 70
                },  {
                    name: "charges_per_day",
                    title: "Charges per Day($)",
                    type: "text",
                    width: 70
                }, {
                    name: "actions",
                    title: "Actions",
                    type: "text",
                    width: 70
                }, {
                    type: "control",
                    editButton: false,
                    deleteButton: false,
                    modeSwitchButton: false
                }]
            })
        }(),
        function() {
            $("#adsGrid").jsGrid({
                height: "500px",
                width: "100%",
                filtering: !0,
                editing: 0,
                sorting: !0,
                paging: !0,
                autoload: !0,
                pageSize: 15,
                pageButtonCount: 5,
                controller: ads,
                fields: [{
                    name: "id",
                    title: "ID",
                    type: "number",
                    width: 25
                }, {
                    name: "name",
                    title: "Name",
                    type: "text",
                    width: 70
                }, {
                    name: "link",
                    title: "URL",
                    type: "text",
                    width: 180
                }, {
                    name: "actions",
                    title: "Actions",
                    type: "text",
                    width: 70
                }, {
                    type: "control",
                    editButton: false,
                    deleteButton: false,
                    modeSwitchButton: false
                }]
            })
        }(),
        function() {
            $("#payoutsGrid").jsGrid({
                height: "500px",
                width: "100%",
                filtering: !0,
                editing: 0,
                sorting: !0,
                paging: !0,
                autoload: !0,
                pageSize: 15,
                pageButtonCount: 5,
                controller: payouts,
                fields: [{
                    name: "id",
                    title: "ID",
                    type: "number",
                    width: 25
                }, {
                    name: "restaurant.name",
                    title: "Name",
                    type: "text",
                    width: 100
                }, {
                    name: "from_date",
                    title: "From",
                    type: "text",
                    width: 100
                }, {
                    name: "to_date",
                    title: "To",
                    type: "text",
                    width: 100
                }, {
                    name: "amount",
                    title: "Amount",
                    type: "text",
                    width: 100
                }, {
                    name: "status",
                    title: "Status",
                    type: "text",
                    width: 50
                }, {
                    name: "actions",
                    title: "Actions",
                    type: "text",
                    width: 70
                }, {
                    type: "control",
                    editButton: false,
                    deleteButton: false,
                    modeSwitchButton: false
                }]
            })
        }(),
        function() {
            $("#recentOrdersGrid").jsGrid({
                height: "1000px",
                width: "100%",
                filtering: !0,
                editing: 0,
                sorting: !0,
                paging: !0,
                autoload: !0,
                pageSize: 25,
                pageButtonCount: 5,
                controller: recentOrders,
                fields: [{
                    name: "id",
                    title: "ID",
                    type: "number",
                    width: 25
                }, {
                    name: "customer.first_name",
                    title: "Customer Name",
                    type: "text",
                    width: 50
                }, {
                    name: "address.formatted_address",
                    title: "Customer Address",
                    type: "text",
                    width: 100
                }, {
                    name: "restaurant.name",
                    title: "Restaurant Name",
                    type: "text",
                    width: 50
                }, {
                    name: "restaurant.address.street_address",
                    title: "Restaurant Address",
                    type: "text",
                    width: 100
                }, {
                    name: "total",
                    title: "($) Price",
                    type: "text",
                    width: 50
                }, {
                    name: "created_at",
                    title: "Received At",
                    type: "text",
                    width: 50
                }, {
                    name: "actions",
                    title: "Actions",
                    type: "text",
                    width: 45
                }, {
                    type: "control",
                    editButton: false,
                    deleteButton: false,
                    modeSwitchButton: false
                }]
            })
        }(),
        function() {
            $("#couponsGrid").jsGrid({
                height: "500px",
                width: "100%",
                filtering: !0,
                editing: 0,
                sorting: !0,
                paging: !0,
                autoload: !0,
                pageSize: 15,
                pageButtonCount: 5,
                controller: coupons,
                fields: [{
                    name: "id",
                    title: "ID",
                    type: "number",
                    width: 25
                }, {
                    name: "text",
                    title: "Name",
                    type: "text",
                    width: 70
                }, {
                    name: "type",
                    title: "Type",
                    type: "text",
                    width: 70
                }, {
                    name: "active_from",
                    title: "From",
                    type: "text",
                    width: 70
                },  {
                    name: "active_until",
                    title: "Till",
                    type: "text",
                    width: 70
                }, {
                    name: "actions",
                    title: "Actions",
                    type: "text",
                    filtering: 0,
                    width: 70
                }, {
                    type: "control",
                    editButton: false,
                    deleteButton: false,
                    modeSwitchButton: false
                }]
            })
        }(),
        function() {
            $("#menuItemsGrid").jsGrid({
                height: "500px",
                width: "100%",
                filtering: !0,
                editing: 0,
                sorting: !0,
                paging: !0,
                autoload: !0,
                pageSize: 15,
                pageButtonCount: 5,
                controller: menuItems,
                fields: [{
                    name: "id",
                    title: "ID",
                    type: "number",
                    width: 25
                }, {
                    name: "name",
                    title: "Name",
                    type: "text",
                    width: 70
                }, {
                    name: "price",
                    title: "Price",
                    type: "text"
                }, {
                    name: "created_at",
                    title: "Created At",
                    type: "text"
                }, {
                    name: "actions",
                    title: "Actions",
                    type: "text",
                    width: 70
                }, {
                    type: "control",
                    editButton: false,
                    deleteButton: false,
                    modeSwitchButton: false
                }]
            })
        }(),
        function() {
            $("#ordersGrid").jsGrid({
                height: "500px",
                width: "100%",
                filtering: !0,
                editing: 0,
                sorting: !0,
                paging: !0,
                autoload: !0,
                pageSize: 15,
                pageButtonCount: 5,
                controller: orders,
                fields: [{
                    name: "id",
                    title: "ID",
                    type: "number",
                    width: 25
                }, {
                    name: "customer.first_name",
                    title: "Customer Name",
                    type: "text",
                    width: 50
                }, {
                    name: "address.formatted_address",
                    title: "Customer Address",
                    type: "text",
                    width: 100
                }, {
                    name: "restaurant.name",
                    title: "Restaurant Name",
                    type: "text",
                    width: 100
                }, {
                    name: "restaurant.address.street_address",
                    title: "Restaurant Address",
                    type: "text",
                    width: 100
                }, {
                    name: "status",
                    title: "Status",
                    type: "text",
                    width: 70
                }, {
                    name: "total",
                    title: "Total",
                    type: "text",
                    width: 70
                }, {
                    name: "created_at",
                    title: "Ordered At",
                    type: "text",
                    width: 70
                }, {
                    name: "actions",
                    title: "Actions",
                    type: "text",
                    width: 70,
                    filtering: 0
                }, {
                    type: "control",
                    editButton: false,
                    deleteButton: false,
                    modeSwitchButton: false
                }]
            })
        }(),
        function() {
            $("#menuCategoriesGrid").jsGrid({
                height: "500px",
                width: "100%",
                filtering: !0,
                editing: 0,
                sorting: !0,
                paging: !0,
                autoload: !0,
                pageSize: 15,
                pageButtonCount: 5,
                controller: menuCategories,
                fields: [{
                    name: "id",
                    title: "ID",
                    type: "number",
                    width: 25
                }, {
                    name: "name",
                    title: "Name",
                    type: "text",
                    width: 70
                }, {
                    name: "created_at",
                    title: "Created At",
                    type: "text"
                }, {
                    name: "actions",
                    title: "Actions",
                    type: "text",
                    width: 70
                }, {
                    type: "control",
                    editButton: false,
                    deleteButton: false,
                    modeSwitchButton: false
                }]
            })
        }(),
        function() {
            $("#staticgrid").jsGrid({
                height: "500px",
                width: "100%",
                sorting: !0,
                paging: !0,
                data: db.clients,
                fields: [{
                    name: "Name",
                    type: "text",
                    width: 150
                }, {
                    name: "Age",
                    type: "number",
                    width: 70
                }, {
                    name: "Address",
                    type: "text",
                    width: 200
                }, {
                    name: "Country",
                    type: "select",
                    items: db.countries,
                    valueField: "Id",
                    textField: "Name"
                }, {
                    name: "Married",
                    type: "checkbox",
                    title: "Is Married"
                }]
            })
        }(),
        
        function() {
            $("#exampleSorting").jsGrid({
                height: "500px",
                width: "100%",
                autoload: !0,
                selecting: !1,
                controller: db,
                fields: [{
                    name: "Name",
                    type: "text",
                    width: 150
                }, {
                    name: "Age",
                    type: "number",
                    width: 50
                }, {
                    name: "Address",
                    type: "text",
                    width: 200
                }, {
                    name: "Country",
                    type: "select",
                    items: db.countries,
                    valueField: "Id",
                    textField: "Name"
                }, {
                    name: "Married",
                    type: "checkbox",
                    title: "Is Married"
                }]
            }), $("#sortingField").on("change", function() {
                var field = $(this).val();
                $("#exampleSorting").jsGrid("sort", field)
            })
        }(),
        
        function() {
            var MyDateField = function(config) {
                jsGrid.Field.call(this, config)
            };
            MyDateField.prototype = new jsGrid.Field({
                sorter: function(date1, date2) {
                    return new Date(date1) - new Date(date2)
                },
                itemTemplate: function(value) {
                    return new Date(value).toDateString()
                },
                insertTemplate: function() {
                    if (!this.inserting) return "";
                    var $result = this.insertControl = this._createTextBox();
                    return $result
                },
                editTemplate: function(value) {
                    if (!this.editing) return this.itemTemplate(value);
                    var $result = this.editControl = this._createTextBox();
                    return $result.val(value), $result
                },
                insertValue: function() {
                    return this.insertControl.datepicker("getDate")
                },
                editValue: function() {
                    return this.editControl.datepicker("getDate")
                },
                _createTextBox: function() {
                    return $("<input>").attr("type", "text").addClass("form-control input-sm").datepicker({
                        autoclose: !0
                    })
                }
            }), jsGrid.fields.myDateField = MyDateField, $("#exampleCustomGridField").jsGrid({
                height: "500px",
                width: "100%",
                inserting: !0,
                editing: !0,
                sorting: !0,
                paging: !0,
                data: db.users,
                fields: [{
                    name: "Account",
                    width: 150,
                    align: "center"
                }, {
                    name: "Name",
                    type: "text"
                }, {
                    name: "RegisterDate",
                    type: "myDateField",
                    width: 100,
                    align: "center"
                }, {
                    type: "control",
                    editButton: !1,
                    modeSwitchButton: !1
                }]
            })
        }()
}(document, window, jQuery);