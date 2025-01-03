/**
 * Template Name: NiceAdmin
 * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
 * Updated: Apr 20 2024 with Bootstrap v5.3.3
 * Author: BootstrapMade.com
 * License: https://bootstrapmade.com/license/
 */

(function () {
  "use strict";

  /**
   * Easy selector helper function
   */
  const select = (el, all = false) => {
    el = el.trim();
    if (all) {
      return [...document.querySelectorAll(el)];
    } else {
      return document.querySelector(el);
    }
  };

  /**
   * Easy event listener function
   */
  const on = (type, el, listener, all = false) => {
    if (all) {
      select(el, all).forEach((e) => e.addEventListener(type, listener));
    } else {
      select(el, all).addEventListener(type, listener);
    }
  };

  /**
   * Easy on scroll event listener
   */
  const onscroll = (el, listener) => {
    el.addEventListener("scroll", listener);
  };

  /**
   * Sidebar toggle
   */
  if (select(".toggle-sidebar-btn")) {
    on("click", ".toggle-sidebar-btn", function (e) {
      select("body").classList.toggle("toggle-sidebar");
    });
  }

  /**
   * Search bar toggle
   */
  if (select(".search-bar-toggle")) {
    on("click", ".search-bar-toggle", function (e) {
      select(".search-bar").classList.toggle("search-bar-show");
    });
  }

  /**
   * Navbar links active state on scroll
   */
  let navbarlinks = select("#navbar .scrollto", true);
  const navbarlinksActive = () => {
    let position = window.scrollY + 200;
    navbarlinks.forEach((navbarlink) => {
      if (!navbarlink.hash) return;
      let section = select(navbarlink.hash);
      if (!section) return;
      if (
        position >= section.offsetTop &&
        position <= section.offsetTop + section.offsetHeight
      ) {
        navbarlink.classList.add("active");
      } else {
        navbarlink.classList.remove("active");
      }
    });
  };
  window.addEventListener("load", navbarlinksActive);
  onscroll(document, navbarlinksActive);

  /**
   * Toggle .header-scrolled class to #header when page is scrolled
   */
  let selectHeader = select("#header");
  if (selectHeader) {
    const headerScrolled = () => {
      if (window.scrollY > 100) {
        selectHeader.classList.add("header-scrolled");
      } else {
        selectHeader.classList.remove("header-scrolled");
      }
    };
    window.addEventListener("load", headerScrolled);
    onscroll(document, headerScrolled);
  }

  /**
   * Back to top button
   */
  let backtotop = select(".back-to-top");
  if (backtotop) {
    const toggleBacktotop = () => {
      if (window.scrollY > 100) {
        backtotop.classList.add("active");
      } else {
        backtotop.classList.remove("active");
      }
    };
    window.addEventListener("load", toggleBacktotop);
    onscroll(document, toggleBacktotop);
  }

  /**
   * Initiate tooltips
   */
  var tooltipTriggerList = [].slice.call(
    document.querySelectorAll('[data-bs-toggle="tooltip"]')
  );
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
  });

  /**
   * Initiate quill editors
   */
  if (select(".quill-editor-default")) {
    new Quill(".quill-editor-default", {
      theme: "snow",
    });
  }

  if (select(".quill-editor-bubble")) {
    new Quill(".quill-editor-bubble", {
      theme: "bubble",
    });
  }

  if (select(".quill-editor-full")) {
    new Quill(".quill-editor-full", {
      modules: {
        toolbar: [
          [
            {
              font: [],
            },
            {
              size: [],
            },
          ],
          ["bold", "italic", "underline", "strike"],
          [
            {
              color: [],
            },
            {
              background: [],
            },
          ],
          [
            {
              script: "super",
            },
            {
              script: "sub",
            },
          ],
          [
            {
              list: "ordered",
            },
            {
              list: "bullet",
            },
            {
              indent: "-1",
            },
            {
              indent: "+1",
            },
          ],
          [
            "direction",
            {
              align: [],
            },
          ],
          ["link", "image", "video"],
          ["clean"],
        ],
      },
      theme: "snow",
    });
  }

  /**
   * Initiate TinyMCE Editor
   */

  const useDarkMode = window.matchMedia("(prefers-color-scheme: dark)").matches;
  const isSmallScreen = window.matchMedia("(max-width: 1023.5px)").matches;

  tinymce.init({
    selector: "textarea.tinymce-editor",
    plugins:
      "preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons accordion",
    editimage_cors_hosts: ["picsum.photos"],
    menubar: "file edit view insert format tools table help",
    toolbar:
      "undo redo | accordion accordionremove | blocks fontfamily fontsize | bold italic underline strikethrough | align numlist bullist | link image | table media | lineheight outdent indent| forecolor backcolor removeformat | charmap emoticons | code fullscreen preview | save print | pagebreak anchor codesample | ltr rtl",
    autosave_ask_before_unload: true,
    autosave_interval: "30s",
    autosave_prefix: "{path}{query}-{id}-",
    autosave_restore_when_empty: false,
    autosave_retention: "2m",
    image_advtab: true,
    link_list: [
      {
        title: "My page 1",
        value: "https://www.tiny.cloud",
      },
      {
        title: "My page 2",
        value: "http://www.moxiecode.com",
      },
    ],
    image_list: [
      {
        title: "My page 1",
        value: "https://www.tiny.cloud",
      },
      {
        title: "My page 2",
        value: "http://www.moxiecode.com",
      },
    ],
    image_class_list: [
      {
        title: "None",
        value: "",
      },
      {
        title: "Some class",
        value: "class-name",
      },
    ],
    importcss_append: true,
    file_picker_callback: (callback, value, meta) => {
      /* Provide file and text for the link dialog */
      if (meta.filetype === "file") {
        callback("https://www.google.com/logos/google.jpg", {
          text: "My text",
        });
      }

      /* Provide image and alt text for the image dialog */
      if (meta.filetype === "image") {
        callback("https://www.google.com/logos/google.jpg", {
          alt: "My alt text",
        });
      }

      /* Provide alternative source and posted for the media dialog */
      if (meta.filetype === "media") {
        callback("movie.mp4", {
          source2: "alt.ogg",
          poster: "https://www.google.com/logos/google.jpg",
        });
      }
    },
    height: 600,
    image_caption: true,
    quickbars_selection_toolbar:
      "bold italic | quicklink h2 h3 blockquote quickimage quicktable",
    noneditable_class: "mceNonEditable",
    toolbar_mode: "sliding",
    contextmenu: "link image table",
    skin: useDarkMode ? "oxide-dark" : "oxide",
    content_css: useDarkMode ? "dark" : "default",
    content_style:
      "body { font-family:Helvetica,Arial,sans-serif; font-size:16px }",
  });

  /**
   * Initiate Bootstrap validation check
   */
  var needsValidation = document.querySelectorAll(".needs-validation");

  Array.prototype.slice.call(needsValidation).forEach(function (form) {
    form.addEventListener(
      "submit",
      function (event) {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }

        form.classList.add("was-validated");
      },
      false
    );
  });

  /**
   * Initiate Datatables
   */
  const datatables = select(".datatable", true);
  datatables.forEach((datatable) => {
    new simpleDatatables.DataTable(datatable, {
      perPageSelect: [5, 10, 15, ["All", -1]],
      columns: [
        {
          select: 2,
          sortSequence: ["desc", "asc"],
        },
        {
          select: 3,
          sortSequence: ["desc"],
        },
        {
          select: 4,
          cellClass: "green",
          headerClass: "red",
        },
      ],
    });
  });

  /**
   * Autoresize echart charts
   */
  const mainContainer = select("#main");
  if (mainContainer) {
    setTimeout(() => {
      new ResizeObserver(function () {
        select(".echart", true).forEach((getEchart) => {
          echarts.getInstanceByDom(getEchart).resize();
        });
      }).observe(mainContainer);
    }, 200);
  }

  if ($("#visitor_card").length) {
    // console.log("Visitor card exists");
    //  $("#visitor_card").css("background-color", "#f8f9fa");

    $("#visitor_card .dropdown-item").click(function (e) {
      e.preventDefault();

      var filter = $(this).data("filter");
      var filtertext = $(this).html();

      $("#visitor_card #card_title").html(
        `Visitor <span>| ${filtertext}</span>`
      );

      console.log(filter);

      // Send the AJAX request to the backend with the selected filter
      $.ajax({
        url: "get_visitor_data", // PHP script to handle the filter request
        method: "POST",
        data: {
          get_visitor_data: {
            filter: filter,
          },
        }, // Send the selected filter as data
        dataType: "json", // Tell jQuery to expect a JSON response

        success: function (response) {
          // Check if the response is successful
          console.log(response);
          if (response.status === "success") {
            console.log("Visitor Count:", response.visitorCount); // This should work now
            let statusClass = "";

            if (response.statusText === "increase") {
              // If the percentage is increasing, add the success class
              statusClass = "text-success";
            } else {
              // If the percentage is decreasing, add the danger class
              statusClass = "text-danger";
            }
            // Update the visitor count and change percentage
            $("#visitor_card #count").text(response.visitorCount);
            $("#visitor_card #percentage").text(
              response.changePercentage + "%"
            );
            $("#visitor_card #percentage")
              .removeClass("text-success text-danger")
              .addClass(statusClass);

            $("#visitor_card #incordec").text(response.statusText);
          }
        },
        error: function (xhr, status, error) {
          console.error("Error during AJAX request:", error);
        },
      });
    });

    $("#visitor_card .dropdown-item[data-filter='today']").click();
  }

  if ($("#click_card").length) {
    // console.log("click card exists");
    //  $("#click_card").css("background-color", "#f8f9fa");

    $("#click_card .dropdown-item").click(function (e) {
      e.preventDefault();

      var filter = $(this).data("filter");
      var filtertext = $(this).html();

      $("#click_card #card_title").html(`Clicks <span>| ${filtertext}</span>`);

      console.log(filter);

      // Send the AJAX request to the backend with the selected filter
      $.ajax({
        url: "get_click_data", // PHP script to handle the filter request
        method: "POST",
        data: {
          get_click_data: {
            filter: filter,
          },
        }, // Send the selected filter as data
        dataType: "json", // Tell jQuery to expect a JSON response

        success: function (response) {
          // Check if the response is successful
          console.log(response);
          if (response.status === "success") {
            console.log("click Count:", response.clickCount); // This should work now
            let statusClass = "";

            if (response.statusText === "increase") {
              // If the percentage is increasing, add the success class
              statusClass = "text-success";
            } else {
              // If the percentage is decreasing, add the danger class
              statusClass = "text-danger";
            }
            // Update the click count and change percentage
            $("#click_card #count").text(response.clickCount);
            $("#click_card #percentage").text(response.changePercentage + "%");
            $("#click_card #percentage")
              .removeClass("text-success text-danger")
              .addClass(statusClass);

            $("#click_card #incordec").text(response.statusText);
          }
        },
        error: function (xhr, status, error) {
          console.error("Error during AJAX request:", error);
        },
      });
    });

    $("#click_card .dropdown-item[data-filter='today']").click();
  }

  if ($("#report_card").length) {
    $("#report_card .dropdown-item").click(function (e) {
        e.preventDefault();

        // Get the filter value and filter text from the clicked item
        var filter = $(this).data("filter");
        var filtertext = $(this).html();

        // Update the card title with the selected filter text
        $("#report_card #card_title").html(
            `Reports <span>| ${filtertext}</span>`
        );

        console.log("Selected Filter:", filter);

        // Send the AJAX request to the backend with the selected filter
        $.ajax({
            url: "get_report_data", // PHP script to handle the filter request
            method: "POST",
            data: {
                get_report_data: {
                    filter: filter, // Send filter to the server
                },
            },
            dataType: "json", // Expecting JSON response
            success: function (response) {
                console.log("Response Data:", response);
                if (response.status === "success") {
                    const clickDates = response.clickDates; // Array of click timestamps
                    const visitorDates = response.visitorDates; // Array of visitor timestamps

                    // Prepare data for chart
                    let seriesData = [
                        {
                            name: "Clicks",
                            data: [],
                        },
                        {
                            name: "Visitors",
                            data: [],
                        },
                    ];

                    // Ensure the date parsing is correct
                    function parseDate(dateValue) {
                        let date = new Date(dateValue);
                        // If the date is invalid, return null
                        if (isNaN(date)) {
                            console.warn("Invalid date:", dateValue);
                            return null;
                        }
                        return date;
                    }

                    // Determine X-axis categories based on the selected filter
                    let xAxisCategories = [];
                    if (filter === "today") {
                        let hours = Array(24).fill(0); // Initialize an array for 24 hours

                        clickDates.forEach((clickDate) => {
                            let date = parseDate(clickDate);
                            if (date) {
                                let hour = date.getHours();
                                hours[hour] += 1; // Increment click count for the corresponding hour
                            }
                        });

                        visitorDates.forEach((visitorDate) => {
                            let date = parseDate(visitorDate);
                            if (date) {
                                let hour = date.getHours();
                                hours[hour] += 1; // Increment visitor count for the corresponding hour
                            }
                        });

                        // Auto generate hours for today (from 0:00 to 23:00)
                        xAxisCategories = Array.from({ length: 24 }, (_, i) => {
                            let date = new Date();
                            date.setHours(i, 0, 0, 0); // Set the date to the start of each hour
                            return date.getTime(); // Use timestamp for the x-axis
                        });

                        seriesData[0].data = hours.slice(); // Copy the hour array for clicks
                        seriesData[1].data = hours.slice(); // Copy the hour array for visitors
                    } else if (filter === "month") {
                        const now = new Date();
                        const daysInMonth = new Date(
                            now.getFullYear(),
                            now.getMonth() + 1,
                            0
                        ).getDate();

                        // Auto generate dates for the days of the month (e.g., 1st to 31st)
                        xAxisCategories = Array.from(
                            { length: daysInMonth },
                            (_, i) => {
                                let date = new Date(now.getFullYear(), now.getMonth(), i + 1);
                                return date.getTime(); // Use timestamp for the x-axis
                            }
                        );

                        // Initialize counters for clicks and visitors per day
                        let clickCounts = Array(daysInMonth).fill(0);
                        let visitorCounts = Array(daysInMonth).fill(0);

                        clickDates.forEach((clickDate) => {
                            let date = parseDate(clickDate);
                            if (date) {
                                let day = date.getDate();
                                clickCounts[day - 1] += 1; // Increment click count for the corresponding day
                            }
                        });

                        visitorDates.forEach((visitorDate) => {
                            let date = parseDate(visitorDate);
                            if (date) {
                                let day = date.getDate();
                                visitorCounts[day - 1] += 1; // Increment visitor count for the corresponding day
                            }
                        });

                        seriesData[0].data = clickCounts;
                        seriesData[1].data = visitorCounts;
                    } else if (filter === "year") {
                        const monthNames = [
                            "January", "February", "March", "April", "May", "June",
                            "July", "August", "September", "October", "November", "December"
                        ];

                        // Auto generate months for the year (e.g., January to December)
                        xAxisCategories = monthNames.map((month, i) => {
                            let date = new Date();
                            date.setMonth(i);
                            date.setDate(1); // Set to the first day of the month
                            return date.getTime(); // Use timestamp for the x-axis
                        });

                        // Initialize counters for clicks and visitors per month
                        let clickCounts = Array(12).fill(0);
                        let visitorCounts = Array(12).fill(0);

                        clickDates.forEach((clickDate) => {
                            let date = parseDate(clickDate);
                            if (date) {
                                let month = date.getMonth();
                                clickCounts[month] += 1; // Increment click count for the corresponding month
                            }
                        });

                        visitorDates.forEach((visitorDate) => {
                            let date = parseDate(visitorDate);
                            if (date) {
                                let month = date.getMonth();
                                visitorCounts[month] += 1; // Increment visitor count for the corresponding month
                            }
                        });

                        seriesData[0].data = clickCounts;
                        seriesData[1].data = visitorCounts;
                    }

                    // Check if the chart already exists, update it; otherwise, create a new one
                    if (window.chart) {
                        window.chart.updateOptions({
                            series: seriesData,
                            xaxis: {
                                categories: xAxisCategories,
                                type: 'datetime', // Always use datetime for the x-axis
                                labels: {
                                    formatter: function (value) {
                                        let date = new Date(value);
                                        if (filter === "today") {
                                            return `${date.getHours().toString().padStart(2, '0')}:${date.getMinutes().toString().padStart(2, '0')}`; // Show hour and minute
                                        } else if (filter === "month") {
                                            return date.getDate(); // Show day number for the month
                                        } else if (filter === "year") {
                                            return date.toLocaleString("default", { month: "long" }); // Show month name for the year
                                        }
                                    },
                                },
                            },
                        });
                    } else {
                        // Initialize the chart with ApexCharts
                        window.chart = new ApexCharts(
                            document.querySelector("#reportsChart"),
                            {
                                series: seriesData,
                                chart: {
                                    type: "area",
                                    stacked: false,
                                    height: 350,
                                    zoom: {
                                        type: "x",
                                        enabled: true,
                                        autoScaleYaxis: true,
                                    },
                                    toolbar: { show: false },
                                },
                                dataLabels: {
                                    enabled: false,
                                },
                                markers: {
                                    size: 0,
                                },
                                xaxis: {
                                    categories: xAxisCategories,
                                    type: 'datetime', // Use datetime type for automatic handling of dates
                                    labels: {
                                        formatter: function (value) {
                                            let date = new Date(value);
                                            if (filter === "today") {
                                                return `${date.getHours().toString().padStart(2, '0')}:${date.getMinutes().toString().padStart(2, '0')}`; // Show hour and minute
                                            } else if (filter === "month") {
                                                return date.getDate(); // Show day number for the month
                                            } else if (filter === "year") {
                                                return date.toLocaleString("default", { month: "long" }); // Show month name for the year
                                            }
                                        },
                                    },
                                },
                            }
                        );
                        window.chart.render();
                    }
                }
            },
            error: function (xhr, status, error) {
                console.error("Error during AJAX request:", error);
            },
        });
    });

    // Trigger the 'today' filter by default when the page loads
    $("#report_card .dropdown-item[data-filter='today']").trigger("click");
}



})();
