
document.getElementById("parentContactNumber").addEventListener("input", function() {
    this.value = this.value.replace(/[^0-9]/g, ""); // Remove non-numeric characters
});
