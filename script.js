// Alessandro Porcheddu Portfolio - Interactive JavaScript

// Terminal typing effect configuration
const terminalTextPart1 = [
    '> alessandro --profile',
    'Name: Alessandro Porcheddu',
    'Specialization: Embedded Systems',
    'Languages: Italian, English',
    'Education: B.Sc. CS and Engineering',
    '> skills --list'
];

const terminalTextPart2 = [
    '- C/C++',
    '- RTOS',
    '- PCB Design (KiCad)',
    '- CAN, SPI, I2C',
    '> _'
];

// Wait for DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
    // Initialize terminal typing effect
    initializeTerminal();
    
    // Initialize other interactive elements
    initializePCBTrace();
    initializeSmoothScrolling();
});

/**
 * Initialize terminal typing effect
 */
function initializeTerminal() {
    const terminal = document.querySelector('.terminal');
    if (!terminal) return;

    let currentLine = 0;
    let currentChar = 0;
    let typing = false;
    let interval = null;
    let lines = [];
    let currentPart = 1; // 1 for first part, 2 for second part
    let isDeleting = false;

    // Clear and initialize terminal
    function initTerminal() {
        terminal.innerHTML = `
            <div class="flex mb-4">
                <div class="w-3 h-3 rounded-full bg-red-500 mr-2"></div>
                <div class="w-3 h-3 rounded-full bg-yellow-500 mr-2"></div>
                <div class="w-3 h-3 rounded-full bg-green-500"></div>
            </div>
            <div class="terminal-content flex-1"></div>
        `;
        currentLine = 0;
        currentChar = 0;
        currentPart = 1;
        isDeleting = false;
    }

    function getContentContainer() {
        return terminal.querySelector('.terminal-content');
    }

    function getCurrentTextArray() {
        return currentPart === 1 ? terminalTextPart1 : terminalTextPart2;
    }

    function typeText() {
        typing = true;
        const contentContainer = getContentContainer();
        const textArray = getCurrentTextArray();
        
        if (isDeleting) {
            // Delete current content
            deleteContent(contentContainer, () => {
                // After deletion, switch to part 2 and start typing
                currentPart = 2;
                isDeleting = false;
                currentLine = 0;
                currentChar = 0;
                typeText();
            });
            return;
        }
        
        // Clear content and prepare lines
        contentContainer.innerHTML = '';
        lines = [];
        
        // Add empty lines for current text array
        for (let i = 0; i < textArray.length; i++) {
            const lineDiv = document.createElement('div');
            lineDiv.className = 'mb-2';
            contentContainer.appendChild(lineDiv);
            lines.push(lineDiv);
        }
        
        // Start typing animation
        interval = setInterval(() => {
            if (currentLine < textArray.length) {
                const line = textArray[currentLine];
                
                // Remove cursor from all lines
                lines.forEach((l) => {
                    const c = l.querySelector('.cursor');
                    if (c) c.remove();
                });
                
                // Type next character
                lines[currentLine].textContent = line.substring(0, currentChar + 1);
                
                // Add cursor to current line
                const cursor = document.createElement('span');
                cursor.className = 'cursor';
                cursor.textContent = '|';
                lines[currentLine].appendChild(cursor);
                
                currentChar++;
                
                if (currentChar > line.length) {
                    // Line done, move to next
                    currentLine++;
                    currentChar = 0;
                }
            } else {
                // Current part typing done
                clearInterval(interval);
                typing = false;
                
                if (currentPart === 1) {
                    // Wait a bit then delete and type part 2
                    setTimeout(() => {
                        isDeleting = true;
                        typeText();
                    }, 2000);
                } else {
                    // Part 2 done, restart the whole cycle
                    setTimeout(() => {
                        initTerminal();
                        setTimeout(typeText, 1000);
                    }, 3000);
                }
            }
        }, 50); // Typing speed
    }

    function deleteContent(container, callback) {
        const allLines = container.querySelectorAll('.mb-2');
        let lineIndex = allLines.length - 1;
        
        const deleteInterval = setInterval(() => {
            if (lineIndex >= 0) {
                const currentLine = allLines[lineIndex];
                const currentText = currentLine.textContent.replace('|', '');
                
                if (currentText.length > 0) {
                    // Remove cursor first
                    const cursor = currentLine.querySelector('.cursor');
                    if (cursor) cursor.remove();
                    
                    // Delete one character
                    const newText = currentText.substring(0, currentText.length - 1);
                    currentLine.textContent = newText;
                    
                    // Add cursor back
                    const cursor2 = document.createElement('span');
                    cursor2.className = 'cursor';
                    cursor2.textContent = '|';
                    currentLine.appendChild(cursor2);
                } else {
                    // Line is empty, move to previous line
                    currentLine.remove();
                    lineIndex--;
                }
            } else {
                // All content deleted
                clearInterval(deleteInterval);
                callback();
            }
        }, 30); // Deletion speed
    }

    // Initialize and start the typing effect
    initTerminal();
    setTimeout(typeText, 1000);
}

/**
 * Initialize PCB trace animation toggle
 */
function initializePCBTrace() {
    const pcbTrace = document.querySelector('.pcb-trace');
    if (pcbTrace) {
        pcbTrace.addEventListener('click', function() {
            this.classList.toggle('pcb-trace');
        });
    }
}

/**
 * Initialize smooth scrolling for navigation links
 */
function initializeSmoothScrolling() {
    // Smooth scrolling for navigation links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}

/**
 * Utility function to add fade-in animation to elements when they come into view
 */
function initializeScrollAnimations() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in');
            }
        });
    }, observerOptions);

    // Observe all sections
    document.querySelectorAll('section').forEach(section => {
        observer.observe(section);
    });
}

/**
 * Initialize all interactive features
 */
function initializeAllFeatures() {
    initializeScrollAnimations();
    
    // Add loading states for better UX
    document.body.classList.add('loaded');
    
    // Add keyboard navigation support
    document.addEventListener('keydown', handleKeyboardNavigation);
}

/**
 * Handle keyboard navigation
 */
function handleKeyboardNavigation(e) {
    // Add keyboard shortcuts for better accessibility
    if (e.ctrlKey || e.metaKey) {
        switch(e.key) {
            case '1':
                e.preventDefault();
                document.querySelector('#about')?.scrollIntoView({ behavior: 'smooth' });
                break;
            case '2':
                e.preventDefault();
                document.querySelector('#projects')?.scrollIntoView({ behavior: 'smooth' });
                break;
            case '3':
                e.preventDefault();
                document.querySelector('#skills')?.scrollIntoView({ behavior: 'smooth' });
                break;
            case '4':
                e.preventDefault();
                document.querySelector('#contact')?.scrollIntoView({ behavior: 'smooth' });
                break;
        }
    }
}

// Initialize additional features when DOM is ready
document.addEventListener('DOMContentLoaded', initializeAllFeatures);

// Export functions for potential use by other scripts
window.PortfolioJS = {
    initializeTerminal,
    initializePCBTrace,
    initializeSmoothScrolling,
    initializeScrollAnimations
}; 