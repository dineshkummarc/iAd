Array.prototype.remove = function(from, to) {
	if (typeof from != "number") return this.remove(this.indexOf(from));
	var rest = this.slice((to || from) + 1 || this.length);
	this.length = from < 0 ? this.length + from : from;
	return this.push.apply(this, rest);
};
