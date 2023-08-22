window.addEventListener('load', function(){

    // obtain cookieconsent plugin
    var cc = initCookieConsent();

    // example logo
    var logo = '';
    var cookie = '🍪';

    // run plugin with config object
    cc.run({
        current_lang : 'en',
        autoclear_cookies : true,                   // default: false
        cookie_name: 'cc_cookie',             // default: 'cc_cookie'
        cookie_expiration : 182,                    // default: 182
        page_scripts: true,                         // default: false

        // auto_language: null,                     // default: null; could also be 'browser' or 'document'
        // autorun: true,                           // default: true
        // delay: 0,                                // default: 0
        force_consent: true,
        // hide_from_bots: false,                   // default: false
        // remove_cookie_tables: false              // default: false
        // cookie_domain: location.hostname,        // default: current domain
        // cookie_path: "/",                        // default: root
        // cookie_same_site: "Lax",
        // use_rfc_cookie: false,                   // default: false
        // revision: 0,                             // default: 0

        gui_options: {
            consent_modal: {
                layout: 'box',                      // box,cloud,bar
                position: 'bottom center',           // bottom,middle,top + left,right,center
                transition: 'slide'                 // zoom,slide
            },
            settings_modal: {
                layout: 'box',                      // box,bar
                position: 'right',                // right,left (available only if bar layout selected)
                transition: 'slide'                 // zoom,slide
            }
        },

        onFirstAction: function(){
            // console.log('onFirstAction fired');
        },

        onAccept: function (cookie) {
            // console.log('onAccept fired ...');
        },

        onChange: function (cookie, changed_preferences) {
            // If analytics category is disabled => disable google analytics
            if (!cc.allowedCategory('analytics')) {
                typeof gtag === 'function' && gtag('consent', 'update', {
                    'analytics_storage': 'denied'
                });
            }
        },

        languages: {
            'en': {
                consent_modal: {
                    title: 'We need your consent to use cookies ',
                    description: 'This website uses essential cookies to ensure its proper operation and analytics cookies to understand how you interact with it. The latter will be set only after consent. <button type="button" data-cc="c-settings" class="cc-link">Let me choose</button>',
                    primary_btn: {
                        text: 'Accept all',
                        role: 'accept_all'              // 'accept_selected' or 'accept_all'
                    },
                    secondary_btn: {
                        text: 'Reject all',
                        role: 'accept_necessary'        // 'settings' or 'accept_necessary'
                    }
                },
                settings_modal: {
                    title: logo,
                    save_settings_btn: 'Save settings',
                    accept_all_btn: 'Accept all',
                    reject_all_btn: 'Reject all',
                    close_btn_label: 'Close',
                    cookie_table_headers: [
                        {col1: 'Name'},
                        {col2: 'Purpose'},
                        {col3: 'Expiration'},
                    ],
                    blocks: [
                        {
                            title: 'Cookie consent',
                            description: 'Please review the cookies we set on this website used for the basic functionalities of the website and to enhance your online experience. You can choose for each category to opt-in/out whenever you want. For more details relative to cookies and other sensitive data, please read the full <a href="https://warwick.ac.uk/terms/privacy" class="cc-link" target="_blank">privacy policy</a>.'
                        }, {
                            title: 'Necessary cookies',
                            description: 'TThese cookies are necessary for the operation of our web site, for example, those that determine whether you\'re signed in and who you are.',
                            toggle: {
                                value: 'necessary',
                                enabled: true,
                                readonly: true          // cookie categories with readonly=true are all treated as "necessary cookies"
                            }
                        }, {
                            title: 'Performance and Analytics cookies',
                            description: 'These cookies allow us to track the performance and usage of the Warwick web site with anonymised \'statistics\'. We use cookies to track your route around the Warwick web site and use the statistics that these create to improve the web site\'s performance and user experience.',
                            toggle: {
                                value: 'analytics',     // there are no default categories => you specify them
                                enabled: false,
                                readonly: false
                            },
                            cookie_table: [
                                {
                                    col1: '^_ga, ^_gid',
                                    col2: 'These cookies are used by Google Analytics software to distinguish users. The information we gather includes but is not limited to how users interact with the Warwick web site, which pages are most frequently viewed, how frequently the users visit the web site, traffic source of user visit, demographics data (age and gender), location and device information (make and model). Any data collected is anonymous and used for statistical reporting only. Other cookies created by Google Analytics include _gid, AMP_TOKEN and _gac_<property-id>. These cookies store other randomly generated IDs and campaign information about the user.',
                                    col3: 'Up to two years after last web site visit.',
                                    is_regex: false
                                }
                            ]
                        }, {
                            title: 'More information',
                            description: 'For further information about cookies on warwick.ac.uk sites, please read our page about <a class="cc-link" href="https://warwick.ac.uk/terms/cookies/">cookies</a>.',
                        }
                    ]
                }
            }
        }

    })
});