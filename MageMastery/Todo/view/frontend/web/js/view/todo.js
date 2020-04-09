define(['uiComponent'],function(Component) {
    'use strict';
    //console.log("todo");
    return Component.extend({
        defaults: {
            tasks: [
                {label: "Task 1"},
                {label: "Task 2"},
                {label: "Task 3"},
                {label: "Task 4"}
            ]
        },
        initObservable: function () {
            this._super().observe(['tasks']);
            this.tasks().push({label:"Task 5"});
            return this;
        },
    });
});
