define(['uiComponent','jquery'],function(Component,$) {
    'use strict';
    //console.log("todo");
    return Component.extend({
        defaults: {
            tasks: [
                {id:1, label: "Task 1", status:false, is_deleted:false},
                {id:2, label: "Task 2", status:false, is_deleted:false},
                {id:3, label: "Task 3", status:false, is_deleted:false},
                {id:4, label: "Task 4", status:true, is_deleted:false}
            ]
        },
        initObservable: function () {
            this._super().observe(['tasks']);
            return this;
        },

        switchStatus: function (data, event) {
            const taskId= $(event.target).data('id');
            var items = this.tasks().map(function(task){
                if(task.id===taskId) {
                    task.status= !task.status;
                }
                return task;
            });
            this.tasks(items);
        },

        deleteTask_old: function (taskId) {
            var tasks = [];
            if (this.tasks().length === 1) {
                this.tasks(tasks);
                return;
            }
            this.tasks().forEach(function (task) {
                if(task.id !== taskId) {
                    tasks.push(task);
                }
            });
            this.tasks(tasks);
        },

        deleteTask: function (data, event) {
            const taskId= $(event.target).data('id');
            var items = this.tasks().map(function(task){
                if(task.id === taskId) {
                    task.is_deleted=true;
                }
                return task;
            });
            this.tasks(items);
        },

    });
});
