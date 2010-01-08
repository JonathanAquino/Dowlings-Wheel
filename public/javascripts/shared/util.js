/**
 * Common utility functions.
 */
(function() {

    /**
     * Creates a namespace
     *
     * @param ns  the namespace descriptor, e.g., foo.bar.baz
     */
    var provide = function (ns) {
        // From John Resig, "jQuery namespacing your code"
        // http://www.mail-archive.com/discuss@jquery.com/msg08110.html
        ns = ns.split('.');
        var cur = window, i;
        while ( i = ns.shift() ) {
            if ( !cur[i] ) cur[i] = {};
            cur = cur[i];
        }
    };

    provide('dw.shared.util');
    dw.shared.util.provide = provide;

})();
