<script>

    function OfficeModel(office) {
        "use strict";

        const self = this;
        self.id = office.office_id;
        self.name = office.office_name;
        self.description = office.office_description;
        self.photo = office.office_photo;
        self.type = office.office_type;
        self.date = office.office_date;
    }

    const OfficeViewModel = function() {
        "use strict";

        const self = this;

        /* Knockout Variables **/
        self.allOffices = ko.observableArray([]);


        /* End Knockout Variables **/
        /* --- **/

        /* Knockout Computed **/



        /* End Knockout Computed **/
        /* --- **/

        /* Knockout Subscriptions **/



        /* End Knockout Subscriptions **/
        /* --- **/

        /* Knockout Functions **/



        /* End Knockout Functions **/
        self.apiCall = function() {
            $.ajax({
                type: 'GET',
                dataType: 'json',
                crossDomain: true,
                url: '/offices/getOfficeData',
                success: function(data) {
                    self.allOffices($.map(data, function (item) {
                        return new OfficeModel(
                            item
                        );
                    }));
                },
                error: function(data) {

                }
            });
        }
        /* --- **/

        /* Knockout Init **/

        self.initalize = function() {
            self.apiCall();
        };

        self.initalize();

        /* End Knockout Init **/
        /* --- **/
    };

    $(document).ready(function() {
        var officePageObject;

        if ($.isEmptyObject(officePageObject)) {
            officePageObject = new OfficeViewModel();
            ko.applyBindings(officePageObject, document.getElementById("officePageViewModel"));
        }
    });
</script>
<div id="officePageViewModel">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="relative bg-gray-50 pt-16 pb-20 px-4 sm:px-6 lg:pt-24 lg:pb-28 lg:px-8">
        <div class="relative max-w-7xl mx-auto">
            <div class="text-center">
                <h2 class="text-3xl tracking-tight font-extrabold text-gray-900 sm:text-4xl">
                    Your Office Comparison
                </h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                    Here are 3 perfect offices for your requirements
                </p>
            </div>
            <div class="mt-12 max-w-lg mx-auto grid gap-5 lg:grid-cols-3 lg:max-w-none" data-bind="foreach: allOffices, visible: allOffices().length > 0" style="display: none;">
                <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                    <div class="flex-shrink-0">
                        <img class="h-48 w-full object-cover" data-bind="attr : { src: photo }" alt="">
                    </div>
                    <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                        <div class="flex-1">
                            <p class="text-sm font-medium text-indigo-600">
                                <a href="#" class="hover:underline">
                                    Office
                                </a>
                            </p>
                            <a href="#" class="block mt-2">
                                <p class="text-xl font-semibold text-gray-900" data-bind="text: name">

                                </p>
                                <p class="mt-3 text-base text-gray-500" data-bind="text: description">
                                </p>
                            </a>
                        </div>
                        <div class="mt-6 flex items-center">
                            <div class="flex-shrink-0">
                                <a href="#">
                                    <span class="sr-only">Marcin Dyszyński</span>
                                    <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                </a>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">
                                    <a href="#" class="hover:underline">
                                        Marcin Dyszyński
                                    </a>
                                </p>
                                <div class="flex space-x-1 text-sm text-gray-500">
                                    <time data-bind="text: date">
                                    </time>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-40" id="map">

        </div>
    </div>

</div>
