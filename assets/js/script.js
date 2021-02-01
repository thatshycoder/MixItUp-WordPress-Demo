/**
 @author Shycoder <https://shycoder.com>
 */

// Start mixitup
var container = document.querySelector('.row');
var mixer = mixitup(container, {
    animation: {
        duration: 800,
        nudge: false,
        reverseOut: false,
        effects: 'fade scale(0.41)'
    }
});