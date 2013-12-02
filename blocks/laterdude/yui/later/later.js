YUI.add('moodle-block_laterdude-later', function(Y) {

        M.block_laterdude = M.block_laterdude || {};

        M.block_laterdude.later = {
            init: function(params) {
                if (M.cfg.developerdebug) {
                    var basic = new Y.Console({logSource: Y.Global});
                    basic.render();
                }

                // Find the node.
                var mynode = Y.one('#'+params.id);
                if (mynode) {
                    // Set the to execute 2 seconds after page is being loaded.
                    Y.later(2000, this, function() {

                        var ioconfig = {
                            method: "POST",
                            sync: false,
                            timeout: 10000,
                            data : {'sesskey' : M.cfg.sesskey},
                            on: {
                                success: function(id, o, arguments) {
                                    try {
                                        // We got some valid response. Let's add it to the block.
                                        mynode.append(o.responseText);
                                        Y.log('Executed OK!');
                                    } catch (err) {
                                        Y.log(err.message);
                                    }
                                },
                                failure: function(id, o, arguments) {
                                    try {
                                        mynode.append(o.responseText)
                                    } catch(err) {
                                        Y.log(err.message);
                                    }
                                }
                            }

                        };

                        Y.io(M.cfg.wwwroot + '/blocks/laterdude/data.php', ioconfig);

                    }, [], false);
                } else {
                    Y.log('Unable to find tag!');
                }

            } // end init
        }; // end module

    }, '@VERSION@', {requires: ['node', 'yui-later', 'io-base', 'querystring-stringify-simple','console']}
);
