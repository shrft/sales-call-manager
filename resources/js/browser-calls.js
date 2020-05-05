import $ from "jquery";
const { Device } = require('twilio-client');
/**
 * Twilio Client configuration for the browser-calls-laravel
 * example application.
 */

// Store some selectors for elements we'll reuse
var callStatus = $("#call-status");
var hangUpButton = $(".hangup-button");
var callCustomerButtons = $(".call-customer-button");

var device = null;

/* Helper function to update the call status bar */
function updateCallStatus(status) {
    callStatus.attr('placeholder', status);
}

/* Get a Twilio Client token with an AJAX request */
$(document).ready(function() {
    setupClient();
});

function setupHandlers(device) {
    device.on('ready', function (_device) {
        updateCallStatus("Ready");
        callCustomerButtons.prop("disabled", false);
    });

    /* Report any errors to the call status display */
    device.on('error', function (error) {
        updateCallStatus("ERROR: " + error.message);
    });

    /* Callback for when Twilio Client initiates a new connection */
    device.on('connect', function (connection) {
        // Enable the hang up button and disable the call buttons
        hangUpButton.prop("disabled", false);
        callCustomerButtons.prop("disabled", true);

        // If phoneNumber is part of the connection, this is a call from a
        // support agent to a customer's phone
        if ("phoneNumber" in connection.message) {
            updateCallStatus("In call with " + connection.message.phoneNumber);
        } else {
            // This is a call from a website user to a support agent
            updateCallStatus("In call with support");
        }
    });

    /* Callback for when a call ends */
    device.on('disconnect', function(connection) {
        // Disable the hangup button and enable the call buttons
        hangUpButton.prop("disabled", true);
        callCustomerButtons.prop("disabled", false);

        updateCallStatus("Ready");
    });
};

function setupClient() {
    $.post("/twilio-token", {
        forPage: window.location.pathname,
        _token: $('meta[name="csrf-token"]').attr('content')
    }, function(data) {
        // Set up the Twilio Client device with the token
        device = new Device();
        device.setup(data.token);

        setupHandlers(device);
    });

};

/* Call a customer from a support ticket */
const callCustomer = function(e) {
    e.preventDefault();
    var phone = $('#phone').val();
    updateCallStatus("Calling " + phone + "...");
    
    var params = {"phoneNumber": phone};
    device.connect(params);
};

/* End a call */
window.hangUp = function() {
    device.disconnectAll();
};

callCustomerButtons.on('click',callCustomer);