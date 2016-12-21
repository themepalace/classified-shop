! function () {
	"use strict";

	function e(e, n, t) {
		var i = new f(n);
		switch (e) {
		case "open":
			i.open(t);
			break;
		case "close":
			i.close(t);
			break;
		case "toggle":
			i.toggle(t);
			break;
		default:
			m.error("Method " + e + " does not exist on jQuery.sidr")
		}
	}

	function n(e) {
		return "status" === e ? d : g[e] ? g[e].apply(this, Array.prototype.slice.call(arguments, 1)) : "function" != typeof e && "string" != typeof e && e ? void y.error("Method " + e + " does not exist on jQuery.sidr") : g.toggle.apply(this, arguments)
	}

	function t(e, n) {
		if ("function" == typeof n.source) {
			var t = n.source(name);
			e.html(t)
		} else if ("string" == typeof n.source && r.isUrl(n.source)) C.get(n.source, function (n) {
			e.html(n)
		});
		else if ("string" == typeof n.source) {
			var i = "",
				o = n.source.split(",");
			if (C.each(o, function (e, n) {
				i += '<div class="sidr-inner">' + C(n).html() + "</div>"
			}), n.renaming) {
				var s = C("<div />").html(i);
				s.find("*").each(function (e, n) {
					var t = C(n);
					r.addPrefixes(t)
				}), i = s.html()
			}
			e.html(i)
		} else null !== n.source && C.error("Invalid Sidr Source");
		return e
	}

	function i(e) {
		var i = r.transitions,
			o = C.extend({
				name: "sidr",
				speed: 200,
				side: "left",
				source: null,
				renaming: !0,
				body: "body",
				displace: !0,
				timing: "ease",
				method: "toggle",
				bind: "touchstart click",
				onOpen: function () {},
				onClose: function () {},
				onOpenEnd: function () {},
				onCloseEnd: function () {}
			}, e),
			s = o.name,
			a = C("#" + s);
		return 0 === a.length && (a = C("<div />").attr("id", s).appendTo(C("body"))), i.supported && a.css(i.property, o.side + " " + o.speed / 1e3 + "s " + o.timing), a.addClass("sidr").addClass(o.side).data({
			speed: o.speed,
			side: o.side,
			body: o.body,
			displace: o.displace,
			timing: o.timing,
			method: o.method,
			onOpen: o.onOpen,
			onClose: o.onClose,
			onOpenEnd: o.onOpenEnd,
			onCloseEnd: o.onCloseEnd
		}), a = t(a, o), this.each(function () {
			var e = C(this),
				t = e.data("sidr"),
				i = !1;
			t || (d.moving = !1, d.opened = !1, e.data("sidr", s), e.bind(o.bind, function (e) {
				e.preventDefault(), i || (i = !0, n(o.method, s), setTimeout(function () {
					i = !1
				}, 100))
			}))
		})
	}
	var o = {};
	o.classCallCheck = function (e, n) {
		if (!(e instanceof n)) throw new TypeError("Cannot call a class as a function")
	}, o.createClass = function () {
		function e(e, n) {
			for (var t = 0; t < n.length; t++) {
				var i = n[t];
				i.enumerable = i.enumerable || !1, i.configurable = !0, "value" in i && (i.writable = !0), Object.defineProperty(e, i.key, i)
			}
		}
		return function (n, t, i) {
			return t && e(n.prototype, t), i && e(n, i), n
		}
	}();
	var s, a, d = {
			moving: !1,
			opened: !1
		},
		r = {
			isUrl: function (e) {
				var n = new RegExp("^(https?:\\/\\/)?((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.?)+[a-z]{2,}|((\\d{1,3}\\.){3}\\d{1,3}))(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*(\\?[;&a-z\\d%_.~+=-]*)?(\\#[-a-z\\d_]*)?$", "i");
				return n.test(e) ? !0 : !1
			},
			addPrefixes: function (e) {
				this.addPrefix(e, "id"), this.addPrefix(e, "class"), e.removeAttr("style")
			},
			addPrefix: function (e, n) {
				var t = e.attr(n);
				"string" == typeof t && "" !== t && "sidr-inner" !== t && e.attr(n, t.replace(/([A-Za-z0-9_.\-]+)/g, "sidr-" + n + "-$1"))
			},
			transitions: function () {
				var e = document.body || document.documentElement,
					n = e.style,
					t = !1,
					i = "transition";
				return i in n ? t = !0 : ! function () {
					var e = ["moz", "webkit", "o", "ms"],
						o = void 0,
						s = void 0;
					i = i.charAt(0).toUpperCase() + i.substr(1), t = function () {
						for (s = 0; s < e.length; s++)
							if (o = e[s], o + i in n) return !0;
						return !1
					}(), i = t ? "-" + o.toLowerCase() + "-" + i.toLowerCase() : null
				}(), {
					supported: t,
					property: i
				}
			}()
		},
		u = jQuery,
		l = "sidr-animating",
		c = "open",
		h = "close",
		p = "webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend",
		f = function () {
			function e(n) {
				o.classCallCheck(this, e), this.name = n, this.item = u("#" + n), this.openClass = "sidr" === n ? "sidr-open" : "sidr-open " + n + "-open", this.menuWidth = this.item.outerWidth(!0), this.speed = this.item.data("speed"), this.side = this.item.data("side"), this.displace = this.item.data("displace"), this.timing = this.item.data("timing"), this.method = this.item.data("method"), this.onOpenCallback = this.item.data("onOpen"), this.onCloseCallback = this.item.data("onClose"), this.onOpenEndCallback = this.item.data("onOpenEnd"), this.onCloseEndCallback = this.item.data("onCloseEnd"), this.body = u(this.item.data("body"))
			}
			return o.createClass(e, [{
				key: "getAnimation",
				value: function (e, n) {
					var t = {},
						i = this.side;
					return "open" === e && "body" === n ? t[i] = this.menuWidth + "px" : "close" === e && "menu" === n ? t[i] = "-" + this.menuWidth + "px" : t[i] = 0, t
				}
			}, {
				key: "prepareBody",
				value: function (e) {
					var n = "open" === e ? "hidden" : "";
					if (this.body.is("body")) {
						var t = u("html"),
							i = t.scrollTop();
						t.css("overflow-x", n).scrollTop(i)
					}
				}
			}, {
				key: "openBody",
				value: function () {
					if (this.displace) {
						var e = r.transitions,
							n = this.body;
						if (e.supported) n.css(e.property, this.side + " " + this.speed / 1e3 + "s " + this.timing).css(this.side, 0).css({
							width: n.width(),
							position: "fixed"
						}), n.css(this.side, this.menuWidth + "px");
						else {
							var t = this.getAnimation(c, "body");
							n.css({
								width: n.width(),
								position: "fixed"
							}).animate(t, {
								queue: !1,
								duration: this.speed
							})
						}
					}
				}
			}, {
				key: "onCloseBody",
				value: function () {
					var e = r.transitions,
						n = {
							width: "",
							position: "",
							right: "",
							left: ""
						};
					e.supported && (n[e.property] = ""), this.body.css(n).unbind(p)
				}
			}, {
				key: "closeBody",
				value: function () {
					var e = this;
					if (this.displace)
						if (r.transitions.supported) this.body.css(this.side, 0).one(p, function () {
							e.onCloseBody()
						});
						else {
							var n = this.getAnimation(h, "body");
							this.body.animate(n, {
								queue: !1,
								duration: this.speed,
								complete: function () {
									e.onCloseBody()
								}
							})
						}
				}
			}, {
				key: "moveBody",
				value: function (e) {
					e === c ? this.openBody() : this.closeBody()
				}
			}, {
				key: "onOpenMenu",
				value: function (e) {
					var n = this.name;
					d.moving = !1, d.opened = n, this.item.unbind(p), this.body.removeClass(l).addClass(this.openClass), this.onOpenEndCallback(), "function" == typeof e && e(n)
				}
			}, {
				key: "openMenu",
				value: function (e) {
					var n = this,
						t = this.item;
					if (r.transitions.supported) t.css(this.side, 0).one(p, function () {
						n.onOpenMenu(e)
					});
					else {
						var i = this.getAnimation(c, "menu");
						t.css("display", "block").animate(i, {
							queue: !1,
							duration: this.speed,
							complete: function () {
								n.onOpenMenu(e)
							}
						})
					}
				}
			}, {
				key: "onCloseMenu",
				value: function (e) {
					this.item.css({
						left: "",
						right: ""
					}).unbind(p), u("html").css("overflow-x", ""), d.moving = !1, d.opened = !1, this.body.removeClass(l).removeClass(this.openClass), this.onCloseEndCallback(), "function" == typeof e && e(name)
				}
			}, {
				key: "closeMenu",
				value: function (e) {
					var n = this,
						t = this.item;
					if (r.transitions.supported) t.css(this.side, "").one(p, function () {
						n.onCloseMenu(e)
					});
					else {
						var i = this.getAnimation(h, "menu");
						t.animate(i, {
							queue: !1,
							duration: this.speed,
							complete: function () {
								n.onCloseMenu()
							}
						})
					}
				}
			}, {
				key: "moveMenu",
				value: function (e, n) {
					this.body.addClass(l), e === c ? this.openMenu(n) : this.closeMenu(n)
				}
			}, {
				key: "move",
				value: function (e, n) {
					d.moving = !0, this.prepareBody(e), this.moveBody(e), this.moveMenu(e, n)
				}
			}, {
				key: "open",
				value: function (n) {
					var t = this;
					if (d.opened !== this.name && !d.moving) {
						if (d.opened !== !1) {
							var i = new e(d.opened);
							return void i.close(function () {
								t.open(n)
							})
						}
						this.move("open", n), this.onOpenCallback()
					}
				}
			}, {
				key: "close",
				value: function (e) {
					d.opened !== this.name || d.moving || (this.move("close", e), this.onCloseCallback())
				}
			}, {
				key: "toggle",
				value: function (e) {
					d.opened === this.name ? this.close(e) : this.open(e)
				}
			}]), e
		}(),
		m = jQuery,
		y = jQuery,
		v = ["open", "close", "toggle"],
		g = {},
		b = function (n) {
			return function (t, i) {
				"function" == typeof t ? (i = t, t = "sidr") : t || (t = "sidr"), e(n, t, i)
			}
		};
	for (s = 0; s < v.length; s++) a = v[s], g[a] = b(a);
	var C = jQuery;
	jQuery.sidr = n, jQuery.fn.sidr = i
}();