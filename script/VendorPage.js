var productTab = document.getElementById('product-tab');
var reviewTab = document.getElementById('review-tab');
var discountTab = document.getElementById('discount-tab');
var analyticsTab = document.getElementById('analytics-tab');

// Initially hide all tabs
productTab.style.display = 'none';
reviewTab.style.display = 'none';
discountTab.style.display = 'none';
analyticsTab.style.display = 'none';

// Function to show a specific tab and hide others
function showTab(tab) {
    // Hide all tabs
    productTab.style.display = 'none';
    reviewTab.style.display = 'none';
    discountTab.style.display = 'none';
    analyticsTab.style.display = 'none';

    // Show selected tab
    tab.style.display = 'grid';
}

// Attach click event listener to links with class "tab-link"
document.querySelectorAll('.tab-link').forEach(function(link) {
    link.addEventListener('click', function(event) {
        // Prevent the default link behavior
        event.preventDefault();

        // Determine which tab to show based on the data-tab attribute
        var tabId = link.getAttribute('data-tab');
        var tab = document.getElementById(tabId);

        if (tab) {
            showTab(tab);
        }
    });
});
