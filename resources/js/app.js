import Chart from 'chart.js/auto';
import { createIcons, icons } from 'lucide';

// Helper function to create icons with default all icons
const renderIcons = (options = {}) => {
    return createIcons({
        icons,
        ...options,
    });
};

// Make Chart and Lucide available globally for Blade views
window.Chart = Chart;
window.lucide = {
    createIcons: renderIcons,
    icons,
};

// Automatically initialize client-side lucide icons when DOM is ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
        renderIcons();
    });
} else {
    renderIcons();
}
