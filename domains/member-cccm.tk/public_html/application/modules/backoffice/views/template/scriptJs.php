
    <script type="text/javascript">
        /*! pace 1.0.2 */
        (function () {
            var a, b, c, d, e, f, g, h, i, j, k, l, m, n, o, p, q, r, s, t, u, v, w, x, y, z, A, B, C, D, E, F, G, H, I, J, K, L, M, N, O, P, Q, R, S, T, U, V, W, X = [].slice, Y = {}.hasOwnProperty, Z = function (a, b) {
                function c() {
                    this.constructor = a
                }
                for (var d in b)
                    Y.call(b, d) && (a[d] = b[d]);
                return c.prototype = b.prototype, a.prototype = new c, a.__super__ = b.prototype, a
            }, $ = [].indexOf || function (a) {
                for (var b = 0, c = this.length; c > b; b++)
                    if (b in this && this[b] === a)
                        return b;
                return-1
            };
            for (u = {catchupTime:100, initialRate:.03, minTime:250, ghostTime:100, maxProgressPerFrame:20, easeFactor:1.25, startOnPageLoad:!0, restartOnPushState:!0, restartOnRequestAfter:500, target:"body", elements:{checkInterval:100, selectors:["body"]}, eventLag:{minSamples:10, sampleCount:3, lagThreshold:3}, ajax:{trackMethods:["GET"], trackWebSockets:!0, ignoreURLs:[]}}, C = function(){var a; return null != (a = "undefined" != typeof performance && null !== performance && "function" == typeof performance.now?performance.now():void 0)?a: + new Date}, E = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame, t = window.cancelAnimationFrame || window.mozCancelAnimationFrame, null == E && (E = function(a){return setTimeout(a, 50)}, t = function(a){return clearTimeout(a)}), G = function(a){var b, c; return b = C(), (c = function(){var d; return d = C() - b, d >= 33?(b = C(), a(d, function(){return E(c)})):setTimeout(c, 33 - d)})()}, F = function(){var a, b, c; return c = arguments[0], b = arguments[1], a = 3 <= arguments.length?X.call(arguments, 2):[], "function" == typeof c[b]?c[b].apply(c, a):c[b]}, v = function(){var a, b, c, d, e, f, g; for (b = arguments[0], d = 2 <= arguments.length?X.call(arguments, 1):[], f = 0, g = d.length; g > f; f++)if (c = d[f])for (a in c)Y.call(c, a) && (e = c[a], null != b[a] && "object" == typeof b[a] && null != e && "object" == typeof e?v(b[a], e):b[a] = e); return b}, q = function(a){var b, c, d, e, f; for (c = b = 0, e = 0, f = a.length; f > e; e++)d = a[e], c += Math.abs(d), b++; return c / b}, x = function(a, b){var c, d, e; if (null == a && (a = "options"), null == b && (b = !0), e = document.querySelector("[data-pace-" + a + "]")){if (c = e.getAttribute("data-pace-" + a), !b)return c; try{return JSON.parse(c)} catch (f){return d = f, "undefined" != typeof console && null !== console?console.error("Error parsing inline pace options", d):void 0}}}, g = function(){function a(){}return a.prototype.on = function(a, b, c, d){var e; return null == d && (d = !1), null == this.bindings && (this.bindings = {}), null == (e = this.bindings)[a] && (e[a] = []), this.bindings[a].push({handler:b, ctx:c, once:d})}, a.prototype.once = function(a, b, c){return this.on(a, b, c, !0)}, a.prototype.off = function(a, b){var c, d, e; if (null != (null != (d = this.bindings)?d[a]:void 0)){if (null == b)return delete this.bindings[a]; for (c = 0, e = []; c < this.bindings[a].length; )e.push(this.bindings[a][c].handler === b?this.bindings[a].splice(c, 1):c++); return e}}, a.prototype.trigger = function(){var a, b, c, d, e, f, g, h, i; if (c = arguments[0], a = 2 <= arguments.length?X.call(arguments, 1):[], null != (g = this.bindings)?g[c]:void 0){for (e = 0, i = []; e < this.bindings[c].length; )h = this.bindings[c][e], d = h.handler, b = h.ctx, f = h.once, d.apply(null != b?b:this, a), i.push(f?this.bindings[c].splice(e, 1):e++); return i}}, a}(), j = window.Pace || {}, window.Pace = j, v(j, g.prototype), D = j.options = v({}, u, window.paceOptions, x()), U = ["ajax", "document", "eventLag", "elements"], Q = 0, S = U.length; S > Q; Q++)
                K = U[Q], D[K] === !0 && (D[K] = u[K]);
            i = function (a) {
                function b() {
                    return V = b.__super__.constructor.apply(this, arguments)
                }
                return Z(b, a), b
            }(Error), b = function () {
                function a() {
                    this.progress = 0
                }
                return a.prototype.getElement = function () {
                    var a;
                    if (null == this.el) {
                        if (a = document.querySelector(D.target), !a)
                            throw new i;
                        this.el = document.createElement("div"), this.el.className = "pace pace-active", document.body.className = document.body.className.replace(/pace-done/g, ""), document.body.className += " pace-running", this.el.innerHTML = '<div class="pace-progress">\n  <div class="pace-progress-inner"></div>\n</div>\n<div class="pace-activity"></div>', null != a.firstChild ? a.insertBefore(this.el, a.firstChild) : a.appendChild(this.el)
                    }
                    return this.el
                }, a.prototype.finish = function () {
                    var a;
                    return a = this.getElement(), a.className = a.className.replace("pace-active", ""), a.className += " pace-inactive", document.body.className = document.body.className.replace("pace-running", ""), document.body.className += " pace-done"
                }, a.prototype.update = function (a) {
                    return this.progress = a, this.render()
                }, a.prototype.destroy = function () {
                    try {
                        this.getElement().parentNode.removeChild(this.getElement())
                    } catch (a) {
                        i = a
                    }
                    return this.el = void 0
                }, a.prototype.render = function () {
                    var a, b, c, d, e, f, g;
                    if (null == document.querySelector(D.target))
                        return!1;
                    for (a = this.getElement(), d = "translate3d(" + this.progress + "%, 0, 0)", g = ["webkitTransform", "msTransform", "transform"], e = 0, f = g.length; f > e; e++)
                        b = g[e], a.children[0].style[b] = d;
                    return(!this.lastRenderedProgress || this.lastRenderedProgress | 0 !== this.progress | 0) && (a.children[0].setAttribute("data-progress-text", "" + (0 | this.progress) + "%"), this.progress >= 100 ? c = "99" : (c = this.progress < 10 ? "0" : "", c += 0 | this.progress), a.children[0].setAttribute("data-progress", "" + c)), this.lastRenderedProgress = this.progress
                }, a.prototype.done = function () {
                    return this.progress >= 100
                }, a
            }(), h = function () {
                function a() {
                    this.bindings = {}
                }
                return a.prototype.trigger = function (a, b) {
                    var c, d, e, f, g;
                    if (null != this.bindings[a]) {
                        for (f = this.bindings[a], g = [], d = 0, e = f.length; e > d; d++)
                            c = f[d], g.push(c.call(this, b));
                        return g
                    }
                }, a.prototype.on = function (a, b) {
                    var c;
                    return null == (c = this.bindings)[a] && (c[a] = []), this.bindings[a].push(b)
                }, a
            }(), P = window.XMLHttpRequest, O = window.XDomainRequest, N = window.WebSocket, w = function (a, b) {
                var c, d, e;
                e = [];
                for (d in b.prototype)
                    try {
                        e.push(null == a[d] && "function" != typeof b[d] ? "function" == typeof Object.defineProperty ? Object.defineProperty(a, d, {get: function () {
                                return b.prototype[d]
                            }, configurable: !0, enumerable: !0}) : a[d] = b.prototype[d] : void 0)
                    } catch (f) {
                        c = f
                    }
                return e
            }, A = [], j.ignore = function () {
                var a, b, c;
                return b = arguments[0], a = 2 <= arguments.length ? X.call(arguments, 1) : [], A.unshift("ignore"), c = b.apply(null, a), A.shift(), c
            }, j.track = function () {
                var a, b, c;
                return b = arguments[0], a = 2 <= arguments.length ? X.call(arguments, 1) : [], A.unshift("track"), c = b.apply(null, a), A.shift(), c
            }, J = function (a) {
                var b;
                if (null == a && (a = "GET"), "track" === A[0])
                    return"force";
                if (!A.length && D.ajax) {
                    if ("socket" === a && D.ajax.trackWebSockets)
                        return!0;
                    if (b = a.toUpperCase(), $.call(D.ajax.trackMethods, b) >= 0)
                        return!0
                }
                return!1
            }, k = function (a) {
                function b() {
                    var a, c = this;
                    b.__super__.constructor.apply(this, arguments), a = function (a) {
                        var b;
                        return b = a.open, a.open = function (d, e) {
                            return J(d) && c.trigger("request", {type: d, url: e, request: a}), b.apply(a, arguments)
                        }
                    }, window.XMLHttpRequest = function (b) {
                        var c;
                        return c = new P(b), a(c), c
                    };
                    try {
                        w(window.XMLHttpRequest, P)
                    } catch (d) {
                    }
                    if (null != O) {
                        window.XDomainRequest = function () {
                            var b;
                            return b = new O, a(b), b
                        };
                        try {
                            w(window.XDomainRequest, O)
                        } catch (d) {
                        }
                    }
                    if (null != N && D.ajax.trackWebSockets) {
                        window.WebSocket = function (a, b) {
                            var d;
                            return d = null != b ? new N(a, b) : new N(a), J("socket") && c.trigger("request", {type: "socket", url: a, protocols: b, request: d}), d
                        };
                        try {
                            w(window.WebSocket, N)
                        } catch (d) {
                        }
                    }
                }
                return Z(b, a), b
            }(h), R = null, y = function () {
                return null == R && (R = new k), R
            }, I = function (a) {
                var b, c, d, e;
                for (e = D.ajax.ignoreURLs, c = 0, d = e.length; d > c; c++)
                    if (b = e[c], "string" == typeof b) {
                        if (-1 !== a.indexOf(b))
                            return!0
                    } else if (b.test(a))
                        return!0;
                return!1
            }, y().on("request", function (b) {
                var c, d, e, f, g;
                return f = b.type, e = b.request, g = b.url, I(g) ? void 0 : j.running || D.restartOnRequestAfter === !1 && "force" !== J(f) ? void 0 : (d = arguments, c = D.restartOnRequestAfter || 0, "boolean" == typeof c && (c = 0), setTimeout(function () {
                    var b, c, g, h, i, k;
                    if (b = "socket" === f ? e.readyState < 2 : 0 < (h = e.readyState) && 4 > h) {
                        for (j.restart(), i = j.sources, k = [], c = 0, g = i.length; g > c; c++) {
                            if (K = i[c], K instanceof a) {
                                K.watch.apply(K, d);
                                break
                            }
                            k.push(void 0)
                        }
                        return k
                    }
                }, c))
            }), a = function () {
                function a() {
                    var a = this;
                    this.elements = [], y().on("request", function () {
                        return a.watch.apply(a, arguments)
                    })
                }
                return a.prototype.watch = function (a) {
                    var b, c, d, e;
                    return d = a.type, b = a.request, e = a.url, I(e) ? void 0 : (c = "socket" === d ? new n(b) : new o(b), this.elements.push(c))
                }, a
            }(), o = function () {
                function a(a) {
                    var b, c, d, e, f, g, h = this;
                    if (this.progress = 0, null != window.ProgressEvent)
                        for (c = null, a.addEventListener("progress", function(a){return h.progress = a.lengthComputable?100 * a.loaded / a.total:h.progress + (100 - h.progress) / 2}, !1), g = ["load", "abort", "timeout", "error"], d = 0, e = g.length; e > d; d++)
                            b = g[d], a.addEventListener(b, function () {
                                return h.progress = 100
                            }, !1);
                    else
                        f = a.onreadystatechange, a.onreadystatechange = function () {
                            var b;
                            return 0 === (b = a.readyState) || 4 === b ? h.progress = 100 : 3 === a.readyState && (h.progress = 50), "function" == typeof f ? f.apply(null, arguments) : void 0
                        }
                }
                return a
            }(), n = function () {
                function a(a) {
                    var b, c, d, e, f = this;
                    for (this.progress = 0, e = ["error", "open"], c = 0, d = e.length; d > c; c++)
                        b = e[c], a.addEventListener(b, function () {
                            return f.progress = 100
                        }, !1)
                }
                return a
            }(), d = function () {
                function a(a) {
                    var b, c, d, f;
                    for (null == a && (a = {}), this.elements = [], null == a.selectors && (a.selectors = []), f = a.selectors, c = 0, d = f.length; d > c; c++)
                        b = f[c], this.elements.push(new e(b))
                }
                return a
            }(), e = function () {
                function a(a) {
                    this.selector = a, this.progress = 0, this.check()
                }
                return a.prototype.check = function () {
                    var a = this;
                    return document.querySelector(this.selector) ? this.done() : setTimeout(function () {
                        return a.check()
                    }, D.elements.checkInterval)
                }, a.prototype.done = function () {
                    return this.progress = 100
                }, a
            }(), c = function () {
                function a() {
                    var a, b, c = this;
                    this.progress = null != (b = this.states[document.readyState]) ? b : 100, a = document.onreadystatechange, document.onreadystatechange = function () {
                        return null != c.states[document.readyState] && (c.progress = c.states[document.readyState]), "function" == typeof a ? a.apply(null, arguments) : void 0
                    }
                }
                return a.prototype.states = {loading: 0, interactive: 50, complete: 100}, a
            }(), f = function () {
                function a() {
                    var a, b, c, d, e, f = this;
                    this.progress = 0, a = 0, e = [], d = 0, c = C(), b = setInterval(function () {
                        var g;
                        return g = C() - c - 50, c = C(), e.push(g), e.length > D.eventLag.sampleCount && e.shift(), a = q(e), ++d >= D.eventLag.minSamples && a < D.eventLag.lagThreshold ? (f.progress = 100, clearInterval(b)) : f.progress = 100 * (3 / (a + 3))
                    }, 50)
                }
                return a
            }(), m = function () {
                function a(a) {
                    this.source = a, this.last = this.sinceLastUpdate = 0, this.rate = D.initialRate, this.catchup = 0, this.progress = this.lastProgress = 0, null != this.source && (this.progress = F(this.source, "progress"))
                }
                return a.prototype.tick = function (a, b) {
                    var c;
                    return null == b && (b = F(this.source, "progress")), b >= 100 && (this.done = !0), b === this.last ? this.sinceLastUpdate += a : (this.sinceLastUpdate && (this.rate = (b - this.last) / this.sinceLastUpdate), this.catchup = (b - this.progress) / D.catchupTime, this.sinceLastUpdate = 0, this.last = b), b > this.progress && (this.progress += this.catchup * a), c = 1 - Math.pow(this.progress / 100, D.easeFactor), this.progress += c * this.rate * a, this.progress = Math.min(this.lastProgress + D.maxProgressPerFrame, this.progress), this.progress = Math.max(0, this.progress), this.progress = Math.min(100, this.progress), this.lastProgress = this.progress, this.progress
                }, a
            }(), L = null, H = null, r = null, M = null, p = null, s = null, j.running = !1, z = function () {
                return D.restartOnPushState ? j.restart() : void 0
            }, null != window.history.pushState && (T = window.history.pushState, window.history.pushState = function () {
                return z(), T.apply(window.history, arguments)
            }), null != window.history.replaceState && (W = window.history.replaceState, window.history.replaceState = function () {
                return z(), W.apply(window.history, arguments)
            }), l = {ajax: a, elements: d, document: c, eventLag: f}, (B = function () {
                var a, c, d, e, f, g, h, i;
                for (j.sources = L = [], g = ["ajax", "elements", "document", "eventLag"], c = 0, e = g.length; e > c; c++)
                    a = g[c], D[a] !== !1 && L.push(new l[a](D[a]));
                for (i = null != (h = D.extraSources)?h:[], d = 0, f = i.length; f > d; d++)
                    K = i[d], L.push(new K(D));
                return j.bar = r = new b, H = [], M = new m
            })(), j.stop = function () {
                return j.trigger("stop"), j.running = !1, r.destroy(), s = !0, null != p && ("function" == typeof t && t(p), p = null), B()
            }, j.restart = function () {
                return j.trigger("restart"), j.stop(), j.start()
            }, j.go = function () {
                var a;
                return j.running = !0, r.render(), a = C(), s = !1, p = G(function (b, c) {
                    var d, e, f, g, h, i, k, l, n, o, p, q, t, u, v, w;
                    for (l = 100 - r.progress, e = p = 0, f = !0, i = q = 0, u = L.length; u > q; i = ++q)
                        for (K = L[i], o = null != H[i]?H[i]:H[i] = [], h = null != (w = K.elements)?w:[K], k = t = 0, v = h.length; v > t; k = ++t)
                            g = h[k], n = null != o[k] ? o[k] : o[k] = new m(g), f &= n.done, n.done || (e++, p += n.tick(b));
                    return d = p / e, r.update(M.tick(b, d)), r.done() || f || s ? (r.update(100), j.trigger("done"), setTimeout(function () {
                        return r.finish(), j.running = !1, j.trigger("hide")
                    }, Math.max(D.ghostTime, Math.max(D.minTime - (C() - a), 0)))) : c()
                })
            }, j.start = function (a) {
                v(D, a), j.running = !0;
                try {
                    r.render()
                } catch (b) {
                    i = b
                }
                return document.querySelector(".pace") ? (j.trigger("start"), j.go()) : setTimeout(j.start, 50)
            }, "function" == typeof define && define.amd ? define(["pace"], function () {
                return j
            }) : "object" == typeof exports ? module.exports = j : D.startOnPageLoad && j.start()
        }).call(this);



    </script>

<!--      <script src="//cdn.jsdelivr.net/vue/1.0.10/vue.min.js"></script>-->

    <script>
        /*!
         * jQuery blockUI plugin
         * Version 2.70.0-2014.11.23
         * Requires jQuery v1.7 or later
         *
         * Examples at: http://malsup.com/jquery/block/
         * Copyright (c) 2007-2013 M. Alsup
         * Dual licensed under the MIT and GPL licenses:
         * http://www.opensource.org/licenses/mit-license.php
         * http://www.gnu.org/licenses/gpl.html
         *
         * Thanks to Amir-Hossein Sobhi for some excellent contributions!
         */

        ;
        (function () {
            /*jshint eqeqeq:false curly:false latedef:false */
            "use strict";

            function setup($) {
                $.fn._fadeIn = $.fn.fadeIn;

                var noOp = $.noop || function () {};

                // this bit is to ensure we don't call setExpression when we shouldn't (with extra muscle to handle
                // confusing userAgent strings on Vista)
                var msie = /MSIE/.test(navigator.userAgent);
                var ie6 = /MSIE 6.0/.test(navigator.userAgent) && !/MSIE 8.0/.test(navigator.userAgent);
                var mode = document.documentMode || 0;
                var setExpr = $.isFunction(document.createElement('div').style.setExpression);

                // global $ methods for blocking/unblocking the entire page
                $.blockUI = function (opts) {
                    install(window, opts);
                };
                $.unblockUI = function (opts) {
                    remove(window, opts);
                };

                // convenience method for quick growl-like notifications  (http://www.google.com/search?q=growl)
                $.growlUI = function (title, message, timeout, onClose) {
                    var $m = $('<div class="growlUI"></div>');
                    if (title)
                        $m.append('<h1>' + title + '</h1>');
                    if (message)
                        $m.append('<h2>' + message + '</h2>');
                    if (timeout === undefined)
                        timeout = 3000;

                    // Added by konapun: Set timeout to 30 seconds if this growl is moused over, like normal toast notifications
                    var callBlock = function (opts) {
                        opts = opts || {};

                        $.blockUI({
                            message: $m,
                            fadeIn: typeof opts.fadeIn !== 'undefined' ? opts.fadeIn : 700,
                            fadeOut: typeof opts.fadeOut !== 'undefined' ? opts.fadeOut : 1000,
                            timeout: typeof opts.timeout !== 'undefined' ? opts.timeout : timeout,
                            centerY: false,
                            showOverlay: false,
                            onUnblock: onClose,
                            css: $.blockUI.defaults.growlCSS
                        });
                    };

                    callBlock();
                    var nonmousedOpacity = $m.css('opacity');
                    $m.mouseover(function () {
                        callBlock({
                            fadeIn: 0,
                            timeout: 30000
                        });

                        var displayBlock = $('.blockMsg');
                        displayBlock.stop(); // cancel fadeout if it has started
                        displayBlock.fadeTo(300, 1); // make it easier to read the message by removing transparency
                    }).mouseout(function () {
                        $('.blockMsg').fadeOut(1000);
                    });
                    // End konapun additions
                };

                // plugin method for blocking element content
                $.fn.block = function (opts) {
                    if (this[0] === window) {
                        $.blockUI(opts);
                        return this;
                    }
                    var fullOpts = $.extend({}, $.blockUI.defaults, opts || {});
                    this.each(function () {
                        var $el = $(this);
                        if (fullOpts.ignoreIfBlocked && $el.data('blockUI.isBlocked'))
                            return;
                        $el.unblock({fadeOut: 0});
                    });

                    return this.each(function () {
                        if ($.css(this, 'position') == 'static') {
                            this.style.position = 'relative';
                            $(this).data('blockUI.static', true);
                        }
                        this.style.zoom = 1; // force 'hasLayout' in ie
                        install(this, opts);
                    });
                };

                // plugin method for unblocking element content
                $.fn.unblock = function (opts) {
                    if (this[0] === window) {
                        $.unblockUI(opts);
                        return this;
                    }
                    return this.each(function () {
                        remove(this, opts);
                    });
                };

                $.blockUI.version = 2.70; // 2nd generation blocking at no extra cost!

                // override these in your code to change the default behavior and style
                $.blockUI.defaults = {
                    // message displayed when blocking (use null for no message)
                    message: '<h1>Please wait...</h1>',

                    title: null, // title string; only used when theme == true
                    draggable: true, // only used when theme == true (requires jquery-ui.js to be loaded)

                    theme: false, // set to true to use with jQuery UI themes

                    // styles for the message when blocking; if you wish to disable
                    // these and use an external stylesheet then do this in your code:
                    // $.blockUI.defaults.css = {};
                    css: {
                        padding: 0,
                        margin: 0,
                        width: '30%',
                        top: '40%',
                        left: '35%',
                        textAlign: 'center',
                        color: '#000',
                        border: '3px solid #aaa',
                        backgroundColor: '#fff',
                        cursor: 'wait'
                    },

                    // minimal style set used when themes are used
                    themedCSS: {
                        width: '30%',
                        top: '40%',
                        left: '35%'
                    },

                    // styles for the overlay
                    overlayCSS: {
                        backgroundColor: '#000',
                        opacity: 0.6,
                        cursor: 'wait'
                    },

                    // style to replace wait cursor before unblocking to correct issue
                    // of lingering wait cursor
                    cursorReset: 'default',

                    // styles applied when using $.growlUI
                    growlCSS: {
                        width: '350px',
                        top: '10px',
                        left: '',
                        right: '10px',
                        border: 'none',
                        padding: '5px',
                        opacity: 0.6,
                        cursor: 'default',
                        color: '#fff',
                        backgroundColor: '#000',
                        '-webkit-border-radius': '10px',
                        '-moz-border-radius': '10px',
                        'border-radius': '10px'
                    },

                    // IE issues: 'about:blank' fails on HTTPS and javascript:false is s-l-o-w
                    // (hat tip to Jorge H. N. de Vasconcelos)
                    /*jshint scripturl:true */
                    iframeSrc: /^https/i.test(window.location.href || '') ? 'javascript:false' : 'about:blank',

                    // force usage of iframe in non-IE browsers (handy for blocking applets)
                    forceIframe: false,

                    // z-index for the blocking overlay
                    baseZ: 1000,

                    // set these to true to have the message automatically centered
                    centerX: true, // <-- only effects element blocking (page block controlled via css above)
                    centerY: true,

                    // allow body element to be stetched in ie6; this makes blocking look better
                    // on "short" pages.  disable if you wish to prevent changes to the body height
                    allowBodyStretch: true,

                    // enable if you want key and mouse events to be disabled for content that is blocked
                    bindEvents: true,

                    // be default blockUI will supress tab navigation from leaving blocking content
                    // (if bindEvents is true)
                    constrainTabKey: true,

                    // fadeIn time in millis; set to 0 to disable fadeIn on block
                    fadeIn: 200,

                    // fadeOut time in millis; set to 0 to disable fadeOut on unblock
                    fadeOut: 400,

                    // time in millis to wait before auto-unblocking; set to 0 to disable auto-unblock
                    timeout: 0,

                    // disable if you don't want to show the overlay
                    showOverlay: true,

                    // if true, focus will be placed in the first available input field when
                    // page blocking
                    focusInput: true,

                    // elements that can receive focus
                    focusableElements: ':input:enabled:visible',

                    // suppresses the use of overlay styles on FF/Linux (due to performance issues with opacity)
                    // no longer needed in 2012
                    // applyPlatformOpacityRules: true,

                    // callback method invoked when fadeIn has completed and blocking message is visible
                    onBlock: null,

                    // callback method invoked when unblocking has completed; the callback is
                    // passed the element that has been unblocked (which is the window object for page
                    // blocks) and the options that were passed to the unblock call:
                    //	onUnblock(element, options)
                    onUnblock: null,

                    // callback method invoked when the overlay area is clicked.
                    // setting this will turn the cursor to a pointer, otherwise cursor defined in overlayCss will be used.
                    onOverlayClick: null,

                    // don't ask; if you really must know: http://groups.google.com/group/jquery-en/browse_thread/thread/36640a8730503595/2f6a79a77a78e493#2f6a79a77a78e493
                    quirksmodeOffsetHack: 4,

                    // class name of the message block
                    blockMsgClass: 'blockMsg',

                    // if it is already blocked, then ignore it (don't unblock and reblock)
                    ignoreIfBlocked: false
                };

                // private data and functions follow...

                var pageBlock = null;
                var pageBlockEls = [];

                function install(el, opts) {
                    var css, themedCSS;
                    var full = (el == window);
                    var msg = (opts && opts.message !== undefined ? opts.message : undefined);
                    opts = $.extend({}, $.blockUI.defaults, opts || {});

                    if (opts.ignoreIfBlocked && $(el).data('blockUI.isBlocked'))
                        return;

                    opts.overlayCSS = $.extend({}, $.blockUI.defaults.overlayCSS, opts.overlayCSS || {});
                    css = $.extend({}, $.blockUI.defaults.css, opts.css || {});
                    if (opts.onOverlayClick)
                        opts.overlayCSS.cursor = 'pointer';

                    themedCSS = $.extend({}, $.blockUI.defaults.themedCSS, opts.themedCSS || {});
                    msg = msg === undefined ? opts.message : msg;

                    // remove the current block (if there is one)
                    if (full && pageBlock)
                        remove(window, {fadeOut: 0});

                    // if an existing element is being used as the blocking content then we capture
                    // its current place in the DOM (and current display style) so we can restore
                    // it when we unblock
                    if (msg && typeof msg != 'string' && (msg.parentNode || msg.jquery)) {
                        var node = msg.jquery ? msg[0] : msg;
                        var data = {};
                        $(el).data('blockUI.history', data);
                        data.el = node;
                        data.parent = node.parentNode;
                        data.display = node.style.display;
                        data.position = node.style.position;
                        if (data.parent)
                            data.parent.removeChild(node);
                    }

                    $(el).data('blockUI.onUnblock', opts.onUnblock);
                    var z = opts.baseZ;

                    // blockUI uses 3 layers for blocking, for simplicity they are all used on every platform;
                    // layer1 is the iframe layer which is used to supress bleed through of underlying content
                    // layer2 is the overlay layer which has opacity and a wait cursor (by default)
                    // layer3 is the message content that is displayed while blocking
                    var lyr1, lyr2, lyr3, s;
                    if (msie || opts.forceIframe)
                        lyr1 = $('<iframe class="blockUI" style="z-index:' + (z++) + ';display:none;border:none;margin:0;padding:0;position:absolute;width:100%;height:100%;top:0;left:0" src="' + opts.iframeSrc + '"></iframe>');
                    else
                        lyr1 = $('<div class="blockUI" style="display:none"></div>');

                    if (opts.theme)
                        lyr2 = $('<div class="blockUI blockOverlay ui-widget-overlay" style="z-index:' + (z++) + ';display:none"></div>');
                    else
                        lyr2 = $('<div class="blockUI blockOverlay" style="z-index:' + (z++) + ';display:none;border:none;margin:0;padding:0;width:100%;height:100%;top:0;left:0"></div>');

                    if (opts.theme && full) {
                        s = '<div class="blockUI ' + opts.blockMsgClass + ' blockPage ui-dialog ui-widget ui-corner-all" style="z-index:' + (z + 10) + ';display:none;position:fixed">';
                        if (opts.title) {
                            s += '<div class="ui-widget-header ui-dialog-titlebar ui-corner-all blockTitle">' + (opts.title || '&nbsp;') + '</div>';
                        }
                        s += '<div class="ui-widget-content ui-dialog-content"></div>';
                        s += '</div>';
                    } else if (opts.theme) {
                        s = '<div class="blockUI ' + opts.blockMsgClass + ' blockElement ui-dialog ui-widget ui-corner-all" style="z-index:' + (z + 10) + ';display:none;position:absolute">';
                        if (opts.title) {
                            s += '<div class="ui-widget-header ui-dialog-titlebar ui-corner-all blockTitle">' + (opts.title || '&nbsp;') + '</div>';
                        }
                        s += '<div class="ui-widget-content ui-dialog-content"></div>';
                        s += '</div>';
                    } else if (full) {
                        s = '<div class="blockUI ' + opts.blockMsgClass + ' blockPage" style="z-index:' + (z + 10) + ';display:none;position:fixed"></div>';
                    } else {
                        s = '<div class="blockUI ' + opts.blockMsgClass + ' blockElement" style="z-index:' + (z + 10) + ';display:none;position:absolute"></div>';
                    }
                    lyr3 = $(s);

                    // if we have a message, style it
                    if (msg) {
                        if (opts.theme) {
                            lyr3.css(themedCSS);
                            lyr3.addClass('ui-widget-content');
                        } else
                            lyr3.css(css);
                    }

                    // style the overlay
                    if (!opts.theme /*&& (!opts.applyPlatformOpacityRules)*/)
                        lyr2.css(opts.overlayCSS);
                    lyr2.css('position', full ? 'fixed' : 'absolute');

                    // make iframe layer transparent in IE
                    if (msie || opts.forceIframe)
                        lyr1.css('opacity', 0.0);

                    //$([lyr1[0],lyr2[0],lyr3[0]]).appendTo(full ? 'body' : el);
                    var layers = [lyr1, lyr2, lyr3], $par = full ? $('body') : $(el);
                    $.each(layers, function () {
                        this.appendTo($par);
                    });

                    if (opts.theme && opts.draggable && $.fn.draggable) {
                        lyr3.draggable({
                            handle: '.ui-dialog-titlebar',
                            cancel: 'li'
                        });
                    }

                    // ie7 must use absolute positioning in quirks mode and to account for activex issues (when scrolling)
                    var expr = setExpr && (!$.support.boxModel || $('object,embed', full ? null : el).length > 0);
                    if (ie6 || expr) {
                        // give body 100% height
                        if (full && opts.allowBodyStretch && $.support.boxModel)
                            $('html,body').css('height', '100%');

                        // fix ie6 issue when blocked element has a border width
                        if ((ie6 || !$.support.boxModel) && !full) {
                            var t = sz(el, 'borderTopWidth'), l = sz(el, 'borderLeftWidth');
                            var fixT = t ? '(0 - ' + t + ')' : 0;
                            var fixL = l ? '(0 - ' + l + ')' : 0;
                        }

                        // simulate fixed position
                        $.each(layers, function (i, o) {
                            var s = o[0].style;
                            s.position = 'absolute';
                            if (i < 2) {
                                if (full)
                                    s.setExpression('height', 'Math.max(document.body.scrollHeight, document.body.offsetHeight) - (jQuery.support.boxModel?0:' + opts.quirksmodeOffsetHack + ') + "px"');
                                else
                                    s.setExpression('height', 'this.parentNode.offsetHeight + "px"');
                                if (full)
                                    s.setExpression('width', 'jQuery.support.boxModel && document.documentElement.clientWidth || document.body.clientWidth + "px"');
                                else
                                    s.setExpression('width', 'this.parentNode.offsetWidth + "px"');
                                if (fixL)
                                    s.setExpression('left', fixL);
                                if (fixT)
                                    s.setExpression('top', fixT);
                            } else if (opts.centerY) {
                                if (full)
                                    s.setExpression('top', '(document.documentElement.clientHeight || document.body.clientHeight) / 2 - (this.offsetHeight / 2) + (blah = document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop) + "px"');
                                s.marginTop = 0;
                            } else if (!opts.centerY && full) {
                                var top = (opts.css && opts.css.top) ? parseInt(opts.css.top, 10) : 0;
                                var expression = '((document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop) + ' + top + ') + "px"';
                                s.setExpression('top', expression);
                            }
                        });
                    }

                    // show the message
                    if (msg) {
                        if (opts.theme)
                            lyr3.find('.ui-widget-content').append(msg);
                        else
                            lyr3.append(msg);
                        if (msg.jquery || msg.nodeType)
                            $(msg).show();
                    }

                    if ((msie || opts.forceIframe) && opts.showOverlay)
                        lyr1.show(); // opacity is zero
                    if (opts.fadeIn) {
                        var cb = opts.onBlock ? opts.onBlock : noOp;
                        var cb1 = (opts.showOverlay && !msg) ? cb : noOp;
                        var cb2 = msg ? cb : noOp;
                        if (opts.showOverlay)
                            lyr2._fadeIn(opts.fadeIn, cb1);
                        if (msg)
                            lyr3._fadeIn(opts.fadeIn, cb2);
                    } else {
                        if (opts.showOverlay)
                            lyr2.show();
                        if (msg)
                            lyr3.show();
                        if (opts.onBlock)
                            opts.onBlock.bind(lyr3)();
                    }

                    // bind key and mouse events
                    bind(1, el, opts);

                    if (full) {
                        pageBlock = lyr3[0];
                        pageBlockEls = $(opts.focusableElements, pageBlock);
                        if (opts.focusInput)
                            setTimeout(focus, 20);
                    } else
                        center(lyr3[0], opts.centerX, opts.centerY);

                    if (opts.timeout) {
                        // auto-unblock
                        var to = setTimeout(function () {
                            if (full)
                                $.unblockUI(opts);
                            else
                                $(el).unblock(opts);
                        }, opts.timeout);
                        $(el).data('blockUI.timeout', to);
                    }
                }

                // remove the block
                function remove(el, opts) {
                    var count;
                    var full = (el == window);
                    var $el = $(el);
                    var data = $el.data('blockUI.history');
                    var to = $el.data('blockUI.timeout');
                    if (to) {
                        clearTimeout(to);
                        $el.removeData('blockUI.timeout');
                    }
                    opts = $.extend({}, $.blockUI.defaults, opts || {});
                    bind(0, el, opts); // unbind events

                    if (opts.onUnblock === null) {
                        opts.onUnblock = $el.data('blockUI.onUnblock');
                        $el.removeData('blockUI.onUnblock');
                    }

                    var els;
                    if (full) // crazy selector to handle odd field errors in ie6/7
                        els = $('body').children().filter('.blockUI').add('body > .blockUI');
                    else
                        els = $el.find('>.blockUI');

                    // fix cursor issue
                    if (opts.cursorReset) {
                        if (els.length > 1)
                            els[1].style.cursor = opts.cursorReset;
                        if (els.length > 2)
                            els[2].style.cursor = opts.cursorReset;
                    }

                    if (full)
                        pageBlock = pageBlockEls = null;

                    if (opts.fadeOut) {
                        count = els.length;
                        els.stop().fadeOut(opts.fadeOut, function () {
                            if (--count === 0)
                                reset(els, data, opts, el);
                        });
                    } else
                        reset(els, data, opts, el);
                }

                // move blocking element back into the DOM where it started
                function reset(els, data, opts, el) {
                    var $el = $(el);
                    if ($el.data('blockUI.isBlocked'))
                        return;

                    els.each(function (i, o) {
                        // remove via DOM calls so we don't lose event handlers
                        if (this.parentNode)
                            this.parentNode.removeChild(this);
                    });

                    if (data && data.el) {
                        data.el.style.display = data.display;
                        data.el.style.position = data.position;
                        data.el.style.cursor = 'default'; // #59
                        if (data.parent)
                            data.parent.appendChild(data.el);
                        $el.removeData('blockUI.history');
                    }

                    if ($el.data('blockUI.static')) {
                        $el.css('position', 'static'); // #22
                    }

                    if (typeof opts.onUnblock == 'function')
                        opts.onUnblock(el, opts);

                    // fix issue in Safari 6 where block artifacts remain until reflow
                    var body = $(document.body), w = body.width(), cssW = body[0].style.width;
                    body.width(w - 1).width(w);
                    body[0].style.width = cssW;
                }

                // bind/unbind the handler
                function bind(b, el, opts) {
                    var full = el == window, $el = $(el);

                    // don't bother unbinding if there is nothing to unbind
                    if (!b && (full && !pageBlock || !full && !$el.data('blockUI.isBlocked')))
                        return;

                    $el.data('blockUI.isBlocked', b);

                    // don't bind events when overlay is not in use or if bindEvents is false
                    if (!full || !opts.bindEvents || (b && !opts.showOverlay))
                        return;

                    // bind anchors and inputs for mouse and key events
                    var events = 'mousedown mouseup keydown keypress keyup touchstart touchend touchmove';
                    if (b)
                        $(document).bind(events, opts, handler);
                    else
                        $(document).unbind(events, handler);

                    // former impl...
                    //		var $e = $('a,:input');
                    //		b ? $e.bind(events, opts, handler) : $e.unbind(events, handler);
                }

                // event handler to suppress keyboard/mouse events when blocking
                function handler(e) {
                    // allow tab navigation (conditionally)
                    if (e.type === 'keydown' && e.keyCode && e.keyCode == 9) {
                        if (pageBlock && e.data.constrainTabKey) {
                            var els = pageBlockEls;
                            var fwd = !e.shiftKey && e.target === els[els.length - 1];
                            var back = e.shiftKey && e.target === els[0];
                            if (fwd || back) {
                                setTimeout(function () {
                                    focus(back);
                                }, 10);
                                return false;
                            }
                        }
                    }
                    var opts = e.data;
                    var target = $(e.target);
                    if (target.hasClass('blockOverlay') && opts.onOverlayClick)
                        opts.onOverlayClick(e);

                    // allow events within the message content
                    if (target.parents('div.' + opts.blockMsgClass).length > 0)
                        return true;

                    // allow events for content that is not being blocked
                    return target.parents().children().filter('div.blockUI').length === 0;
                }

                function focus(back) {
                    if (!pageBlockEls)
                        return;
                    var e = pageBlockEls[back === true ? pageBlockEls.length - 1 : 0];
                    if (e)
                        e.focus();
                }

                function center(el, x, y) {
                    var p = el.parentNode, s = el.style;
                    var l = ((p.offsetWidth - el.offsetWidth) / 2) - sz(p, 'borderLeftWidth');
                    var t = ((p.offsetHeight - el.offsetHeight) / 2) - sz(p, 'borderTopWidth');
                    if (x)
                        s.left = l > 0 ? (l + 'px') : '0';
                    if (y)
                        s.top = t > 0 ? (t + 'px') : '0';
                }

                function sz(el, p) {
                    return parseInt($.css(el, p), 10) || 0;
                }

            }


            /*global define:true */
            if (typeof define === 'function' && define.amd && define.amd.jQuery) {
                define(['jquery'], setup);
            } else {
                setup(jQuery);
            }

        })();
    </script>
    
