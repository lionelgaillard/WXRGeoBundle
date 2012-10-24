(function ($) {

    ({

        bind: function () {
            var self = this;
            $(function () { self.init(); });
        },

        init: function () {
            var self = this;

            this.$street    = $('.wxr-geo-location-street');
            this.$city      = $('.wxr-geo-location-city');
            this.$latitude  = $('.wxr-geo-location-latitude');
            this.$longitude = $('.wxr-geo-location-longitude');

            this.$street.change(function () {
                self.updateLatLng();
            });

            this.$city.change(function () {
                self.updateLatLng();
            });
        },

        updateLatLng: function () {
            var self = this;

            $.ajax({
                url: 'http://maps.googleapis.com/maps/api/geocode/json',
                crossDomain: true,
                data: {
                    address: this.$street.val() + ' ' + (this.$city.find('option:selected').text())
                },
                success: function (data) {
                    if (data.results && data.results.geometry) {
                        self.$latitude.val(data.results.geometry.location.lat);
                        self.$longitude.val(data.results.geometry.location.lng);
                    }
                }
            })
        }

    }).bind();

})(jQuery);
