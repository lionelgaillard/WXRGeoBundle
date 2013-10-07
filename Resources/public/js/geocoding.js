;(function ($, window) {

    "use strict";

    // Requires Google Maps API
    if (!window.google || !window.google.maps) {
        return;
    }

    /**
     * Listens changes of inputs and selects with attribute "data-wxr-geo-input"
     * and set latitude and longitude values in respectively "input[data-wxr-geo-latitude]"
     * and "input[data-wxr-geo-longitude]" within the same form.
     *
     * @see https://developers.google.com/maps/documentation/geocoding/
     */
    ({
        geocoder: null,

        bind: function () {
            $($.proxy(this.init, this));
        },

        init: function () {
            this.geocoder = new google.maps.Geocoder();

            // Bind on document to intercept ajax loaded forms
            $(document).on('change', 'input[data-wxr-geo-input], select[data-wxr-geo-input]', $.proxy(this.onChange, this));
        },

        onChange: function (e) {
            var $form      = $(e.target).closest('form'),
                $inputs    = $form.find('input[data-wxr-geo-input], select[data-wxr-geo-input]'),
                $latitude  = $form.find('input[data-wxr-geo-latitude]'),
                $longitude = $form.find('input[data-wxr-geo-longitude]'),
                values     = [];

            if (!($inputs.length && $latitude.length && $longitude.length)) {
                return;
            }

            $inputs.each(function () {
                var $this = $(this),
                    value = $this.is('select') ? ($this.find('option:selected').text()) : $this.val();

                if (value) {
                    values.push(value);
                }
            });

            if (values.length) {
                this.geocoder.geocode(
                    { address: values.join(' ') },
                    function (results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            $latitude.val(results[0].geometry.location.lat());
                            $longitude.val(results[0].geometry.location.lng());
                        } else {
                            $latitude.val('');
                            $longitude.val('');
                        }
                    }
                );
            } else {
                $latitude.val('');
                $longitude.val('');
            }
        }

    }).bind();

})(window.jQuery, window);
