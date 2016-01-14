$(window).on("load", function(){
	$("#side-nav-accordion li.active").parent().parent().parent().parent().find("a.accordion-toggle").click();
});