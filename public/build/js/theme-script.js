// Apply the saved theme settings from local storage
document.querySelector("html").setAttribute("data-layout-mode", localStorage.getItem('layoutMode') || 'light_mode');
document.querySelector("html").setAttribute('data-layout-style', localStorage.getItem('layoutStyle') || 'default');
document.querySelector("html").setAttribute('data-nav-color', localStorage.getItem('navColor') || 'light');

// Create sidebar settings panel using jQuery
let themesettings = `<div class="sidebar-settings nav-toggle" id="layoutDiv">
    <div class="sidebar-content sticky-sidebar-one">
      <div class="sidebar-header">
            <div class="sidebar-theme-title">
                <h5>Theme Customizer</h5>
                <p>Customize & Preview in Real Time</p>
            </div>
            <div class="close-sidebar-icon d-flex">
                <a class="sidebar-close" href="#">X</a>
            </div>
        </div>
        <div class="sidebar-body p-0">
            <div class="theme-mode mb-0">
                <div class="theme-body-main">
                    <div class="theme-head">
                        <h6>Theme Mode</h6>
                        <p>Enjoy Dark & Light modes.</p>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 ">
                            <div class="layout-wrap">
                                <div class="d-flex align-items-center">
                                    <div class="status-toggle d-flex align-items-center me-2">
                                        <input type="radio" name="themes" id="lighttheme" class="check" value="light_mode" checked>
                                        <label for="lighttheme" class="checktoggles">
                                            <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/theme/theme-img-01.jpg" alt="">
                                            <span class="theme-name">Light Mode</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="layout-wrap">
                                <div class="d-flex align-items-center">
                                    <div class="status-toggle d-flex align-items-center me-2">
                                        <input type="radio" name="themes" id="darktheme" class="check" value="dark_mode">
                                        <label for="darktheme" class="checktoggles">
                                            <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/theme/theme-img-02.jpg" alt="">
                                            <span class="theme-name">Dark Mode</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                
                <div class="theme-mode border-0 mb-0">
                    <div class="theme-head">
                        <h6>Layout Mode</h6>
                        <p>Select the primary layout style for your app.</p>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 ere">
                            <div class="layout-wrap">
                                <div class="d-flex align-items-center">
                                    <div class="status-toggle d-flex align-items-center me-2">
                                        <input type="radio" name="layout" id="default_layout" class="check layout-mode" value="default" checked>
                                        <label for="default_layout" class="checktoggles">
                                            <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/theme/theme-img-01.jpg" alt="">
                                            <span class="theme-name">Default</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 ere">
                            <div class="layout-wrap">
                                <div class="d-flex align-items-center">
                                    <div class="status-toggle d-flex align-items-center me-2">
                                        <input type="radio" name="layout" id="box_layout" class="check layout-mode" value="box">
                                        <label for="box_layout" class="checktoggles">
                                            <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/theme/theme-img-03.jpg" alt="">
                                            <span class="theme-name">Box</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 ere">
                            <div class="layout-wrap">
                                <div class="d-flex align-items-center">
                                    <div class="status-toggle d-flex align-items-center me-2">
                                        <input type="radio" name="layout" id="collapse_layout" class="check layout-mode" value="collapsed">
                                        <label for="collapse_layout" class="checktoggles">
                                            <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/theme/theme-img-05.jpg" alt="">
                                            <span class="theme-name">Collapsed</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 ere">
                            <div class="layout-wrap">
                                <div class="d-flex align-items-center">
                                    <div class="status-toggle d-flex align-items-center me-2">
                                        <input type="radio" name="layout" id="horizontal_layout" class="check layout-mode" value="horizontal">
                                        <label for="horizontal_layout" class="checktoggles">
                                            <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/theme/theme-img-06.jpg" alt="">
                                            <span class="theme-name">Horizontal</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 ere">
                            <div class="layout-wrap">
                                <div class="d-flex align-items-center">
                                    <div class="status-toggle d-flex align-items-center me-2">
                                        <input type="radio" name="layout" id="modern_layout" class="check layout-mode" value="modern">
                                        <label for="modern_layout" class="checktoggles">
                                            <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/theme/theme-img-04.jpg" alt="">
                                            <span class="theme-name">Modern</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="theme-mode">
                    <div class="theme-head">
                        <h6>Navigation Colors</h6>
                        <p>Setup the color for the Navigation</p>
                    </div>
                    <div class="row">
                        <div class="col-xl-4 ere">
                            <div class="layout-wrap">
                                <div class="d-flex align-items-center">
                                    <div class="status-toggle d-flex align-items-center me-2">
                                        <input type="radio" name="nav_color" id="light_color" class="check nav-color" value="light">
                                        <label for="light_color" class="checktoggles">
                                            <span class="theme-name">Light</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 ere">
                            <div class="layout-wrap">
                                <div class="d-flex align-items-center">
                                    <div class="status-toggle d-flex align-items-center me-2">
                                        <input type="radio" name="nav_color" id="grey_color" class="check nav-color" value="grey">
                                        <label for="grey_color" class="checktoggles">
                                            <span class="theme-name">Grey</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 ere">
                            <div class="layout-wrap">
                                <div class="d-flex align-items-center">
                                    <div class="status-toggle d-flex align-items-center me-2">
                                        <input type="radio" name="nav_color" id="dark_color" class="check nav-color" value="dark">
                                        <label for="dark_color" class="checktoggles">
                                            <span class="theme-name">Dark</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                </div>
            </div>
            <div class="sidebar-footer">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="footer-preview-btn">
                            <a href="#" class="btn btn-secondary w-100" id="resetbutton">Reset</a>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="footer-preview-btn">
                            <a href="#" class="btn btn-danger w-100 sidebar-close">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
`




$(document).ready(function() {
    $(".main-wrapper").append(themesettings);

    const themeRadios = document.querySelectorAll('input[name="themes"]');
    const layoutRadios = document.querySelectorAll('input[name="layout"]');
    const colorRadios = document.querySelectorAll('input[name="nav_color"]');
    const resetButton = document.getElementById('resetbutton');

    function setThemeAndLayoutSettings(theme, layout, color) {
        document.documentElement.setAttribute('data-layout-mode', theme);
        document.documentElement.setAttribute('data-layout-style', layout);
        document.documentElement.setAttribute('data-nav-color', color);

        localStorage.setItem('layoutMode', theme);
        localStorage.setItem('layoutStyle', layout);
        localStorage.setItem('navColor', color);
    }

    function handleInputChange() {
        const theme = document.querySelector('input[name="themes"]:checked')?.value;
        const layout = document.querySelector('input[name="layout"]:checked')?.value;
        const color = document.querySelector('input[name="nav_color"]:checked')?.value;

        if (theme && layout && color) {
            setThemeAndLayoutSettings(theme, layout, color);
        }
    }

    function resetThemeAndLayoutSettings() {
        setThemeAndLayoutSettings('light_mode', 'default', 'light');

        // Reset radio buttons
        document.querySelector('input[name="themes"][value="light_mode"]').checked = true;
        document.querySelector('input[name="layout"][value="default"]').checked = true;
        document.querySelector('input[name="nav_color"][value="light"]').checked = true; 

        // Reset background color to white
        updateColors('#ffffff');  
        localStorage.removeItem('backgroundColor');
    }

    // Retrieve saved settings or use default values
    const savedTheme = localStorage.getItem('layoutMode') || 'light_mode';
    const savedLayout = localStorage.getItem('layoutStyle') || 'default';
    const savedColor = localStorage.getItem('navColor') || 'light';
    const savedBackgroundColor = localStorage.getItem('backgroundColor') || '#1d6c98';

    // Set radio buttons based on saved settings
    document.querySelector(`input[name="themes"][value="${savedTheme}"]`).checked = true;
    document.querySelector(`input[name="layout"][value="${savedLayout}"]`).checked = true;
    document.querySelector(`input[name="nav_color"][value="${savedColor}"]`).checked = true;
    
    // Initialize color picker value and update colors immediately
    updateColors(savedBackgroundColor);

    // Add event listeners
    themeRadios.forEach(radio => radio.addEventListener('change', handleInputChange));
    layoutRadios.forEach(radio => radio.addEventListener('change', handleInputChange));
    colorRadios.forEach(radio => radio.addEventListener('change', handleInputChange));
    if (resetButton) resetButton.addEventListener('click', resetThemeAndLayoutSettings);

   

    function updateColors(color) {

        // Handle specific cases like .customizer-links
        $('.customizer-links').css('background-color', color);

        // Update .bg-primary class with inline styles
        $('.bg-primary').each(function() {
            $(this).attr('style', function(i, style) {
                const newStyles = (style || '')
                    .replace(/background-color:[^;]+;?/g, '')
                    .replace(/border:[^;]+;?/g, ''); 
                return newStyles + `background-color: ${color} !important; border: 1px solid ${color} !important;`;
            });
        });
    
        // Update .btn.btn-primary class with inline styles
        $('.btn.btn-primary').each(function() {
            $(this).attr('style', function(i, style) {
                const newStyles = (style || '')
                    .replace(/background-color:[^;]+;?/g, '') 
                    .replace(/border:[^;]+;?/g, '') 
                    .replace(/box-shadow:[^;]+;?/g, '') 
                return newStyles + `background-color: ${color} !important; border: 1px solid ${color} !important; box-shadow: 0 4px 20px rgba(${hexToRgb(color)}, 0.15) !important; `;
            });
        });

      
    }

    function hexToRgb(hex) {
        hex = hex.replace(/^#/, '');
        var r = parseInt(hex.slice(0, 2), 16);
        var g = parseInt(hex.slice(2, 4), 16);
        var b = parseInt(hex.slice(4, 6), 16);
        return r + ',' + g + ',' + b;
    }



    // Reset button functionality
    $('#resetbutton').click(function() {
        localStorage.removeItem('backgroundColor');
        updateColors('#1d6c98'); 
    });

    // Change theme mode based on user selection
    $('input[name="themes"]').change(function() {
        var theme = $(this).val();
        localStorage.setItem('layoutMode', theme);
        $('html').attr('data-layout-mode', theme);
    });

    // Change navigation color based on user selection
    $('input[name="nav_color"]').change(function() {
        var navColor = $(this).val();
        localStorage.setItem('navColor', navColor);
        $('html').attr('data-nav-color', navColor);
    });
});