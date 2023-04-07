function toggleMenu($toggler, $to_toggle, $sub_icon, $has_toggle, $sr_only) {
	$toggler.on("click", function () {
		const thisId = $toggler.attr("aria-controls");
		"false" === $toggler.attr("aria-expanded")
			? ($to_toggle.addClass("is-open"),
				$toggler.attr({ "aria-expanded": "true" }),
				$sub_icon.toggleClass("sub-up sub-down"),
				$has_toggle.addClass("has-open-sub"),
				"toggle-button" === $toggler.attr("id") ? $sr_only.text(lang_menuclose) : $sr_only.text(lang_submenuclose).addClass("sr-active"),
				$(".is-togglable").attr("id") != thisId &&
				($(".sub-list:not(#" + thisId + ")").removeClass("is-open"),
					$(".sub-toggler:not([aria-controls=" + thisId + "])").attr({ "aria-expanded": "false" }),
					$(".sub-icon:not([data-menu-icon=" + thisId + "])").attr("class", "sub-icon sub-down"),
					$(".sr-active:not([data-reader=" + thisId + "])").html(lang_submenuopen).removeClass("sr-active"),
					$(".has-sub:not([data-parent=" + thisId + "])").removeClass("has-open-sub")))
			: ($to_toggle.removeClass("is-open"),
				$toggler.attr({ "aria-expanded": "false" }),
				$sub_icon.toggleClass("sub-down sub-up"),
				$has_toggle.removeClass("has-open-sub"),
				"toggle-button" === $toggler.attr("id") ? $sr_only.text(lang_menuopen) : $sr_only.text(lang_submenuopen).removeClass("sr-active"));
	});
}

jQuery(function () {
    "use strict";
	$("#button-menu").find(".toggler").each(function () {
		const $toggler = $(this),
			$sub_icon = $toggler.find(".sub-icon"),
			$sr_only = $toggler.find(".sr-only"),
			$to_toggle = $("#" + $toggler.attr("aria-controls")),
			$has_toggle = $toggler.parent();
		toggleMenu($toggler, $to_toggle, $sub_icon, $has_toggle, $sr_only);
	});

	$("body").on("click", function (e) {
		const $parents = $(e.target).parents();
		if (!$parents.is(".has-open-sub")) {
			$(".sub-toggler").attr({"aria-expanded": "false"});
			$(".sub-icon").attr("class", "sub-icon sub-down");
			$(".sub-list").removeClass("is-open");
			$(".sr-active").html(lang_submenuopen).removeClass("sr-active");
			$(".has-sub").removeClass("has-open-sub");
		}
	});
});
