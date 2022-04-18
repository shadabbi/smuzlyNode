<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js" ></script>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background-color: #f7f7f7;
            }

            .table {
                color: #fff;
                margin: 0 auto; 

            }

            .alignTop {
                vertical-align: top;
                display: flex;
            }

            .leftDetails {
                background-color: #36474f;
                word-break: break-all;
                overflow: hidden;
               
                
            }

            .rightDetails {
                object-fit: contain;
                color: #36474f;
                background-color: #fff;
                padding: 45px 30px;
                padding-right: 5rem;
            }

            .leftTopBx {
                background-color: #506570;
                padding: 35px 0px 16px;
                text-align: center;
                min-width: 150px;
                color: #fff;   
                height: 30%; 
                    }

            .centerTb {
                margin: 0 auto;
            }

            .imgBox {
                max-width: 13rem;
                aspect-ratio: 1;
                border-radius: 50%;
                background-color: #506570;
                
            }

            .applicantName {
                padding: 0 15px;
                 font-weight: 700;
                line-height: 1;
                font-size: 2rem;
                margin: 0;
                margin-bottom: 10px;
            }

            .applicantDesig {
                font-size: 1rem;
                font-weight: 600;
                margin: 0;
            }

            .abtMe {
                background-color: #36474f;
                height: 46rem;
                padding: 1rem;
                width: 20rem;
            }

            .paddingLtr {
                padding: 15px 15px;
            }

            .rightHeadings {
                font-size: 22px;
                font-weight: 900;
                color: #36474f;
                margin-bottom: 25px;
            }

            .leftSubHeadings {
                font-size: 17px;
                color: #fff;
                font-weight: 600;
                margin-top: 0;
                margin-bottom: 1rem;
            }

            .abtMe p {
                font-size: 13px;
                width: 26ch;
            }

            .rightSubHeadings {
                font-size: 12px;
                color: #36474f;
                font-weight: 600;
                margin-top: 20px;
                margin-bottom: 2px;
            }

            .rightSubHeadingsM {
                font-size: 16px;
                color: #36474f;
                font-weight: 600;
                margin-top: 0px;
                margin-bottom: 2px;
            }

            .sumText {
                font-size: 16px;
                line-height: 1.3;
                margin: 0 0;
                font-weight: 500;
                object-fit: contain;
            }
            
            .lastSum {
                font-size: 17px;
                line-height: 1.3;
                margin-bottom: 10px;
                font-weight: 500;
         
            }

            .leftText {
                font-size: 13px;
                line-height: 1.3;
                margin: 0 0;
                color: #fff;
            }

            .sectionRow {
                padding-top: 30px;
            }


            .cv-template  {
                height: fit-content;
                /* display: grid; */
                padding: 20px;
                place-items: center;
                background-color: #f7f7f7;
            }
            .cv-container{
                display:flex; 
                gap:4px;
                position: relative; 
                justify-content: center; 
                width: fit-content;
                margin: 0 auto;
            } 

            .cv-vertical-border {
                position: absolute;
                width: 4px;
                background-color: orange;
                height: 85%;
                top: 52%;
                transform: translateY(-50%);
                left: -10px;
            }

            .cv-profile-details {
                padding: 0 25px 0 10px;
                max-width: 163px;
                word-break: break-all;
            }

            .cv-experience-wrapper {
                background: #fff;
                width: 100%;
            }

            .download-btn {
                position:absolute;
                top: 10px;
                left: 10px;
                z-index: 999999;
            }

            .download-btn button {
                padding: 10px;
                border-radius: 5px;
                cursor: pointer;
            }

            .very-specific-design {
              width: 600px; 
              max-height: 85vh;
              overflow-y: scroll;
              background: white;
              position: absolute;
              left: 50%;
              top: 50%;
              transform: translate(-50%, -50%);
              transform-origin: center center;
            }

            .very-specific-design::-webkit-scrollbar {
              width: 5px;
            }
            .very-specific-design::-webkit-scrollbar-track {
              background: transparent; 
            }
            .very-specific-design::-webkit-scrollbar-thumb {
              background: #888;
              border-radius: 1px; 
            }
            .very-specific-design::-webkit-scrollbar-thumb:hover {
              background: #555; 
            }

            .scaleable-wrapper {
              padding: 20px;
              position: relative;
              height: 130vh;
            }
            #resume {
                height: 100%;
            }
        </style> 
    </head>
    <body style="position:relative;" class="antialiased">

    

        <div class="download-btn">
            <button onclick="handlePrint()">Download PDF</button>
        </div>

        <div class="scaleable-wrapper cv-template" id="scaleable-wrapper">
          <div id="resume" class="table, pdfStyle lang-select default-template templatePreview">
                <div class="alignTop" id="very-specific-design">
                    <div class="leftDetails" style="background-color: gray"> 
                       
                            <div class="leftTopBx">

                                <img src="http://laravelpassportreact.com/assets/images/resumedemo.jpg" class="imgBox" alt="" />

                                <div>
                                    <p class="applicantName">
                                      Nexg Test
                                    </p>

                                    <span class="applicantDesig">
                                        Web Developer
                                    </span>
                                </div>
                            </div>

                      

                        

                        <div class="abtMe">
                            <div class="paddingLtr">

                                <div>
                                    <h6 class="leftSubHeadings">
                                        ABOUT ME
                                    </h6>

                                    <div class="leftText">
                                        <span>
                                            <p >
                                                High self-study ability, work under pressure, high motivation for <br/>
                                                    work and success in any job. <br/>
                                                        Making decisions and responsibilities, dealing with stress and <br/>
                                                working in parallel on several projects.
                                            </p>
                                        </span>
                                    </div>
                                </div>

                                <div>

                                    <h6 class="leftSubHeadings">
                                        CONTACT ME
                                    </h6>

                                    <div class="leftText">
                                        <p class="lang-select flex">EMAIL: 
                                          <span>  nexg@test.com</span></p>
                                        <p class="lang-select flex">COUNTRY: 
                                          <span> 
                                          Indian
                                          </span></p>
                                        <p class="lang-select flex">DATE OF BIRTH: 
                                          <span> 10-07-1998 </span></p>
                                        <p class="lang-select flex">Portfolio: 
                                          <span>http://linkedin.com</span>
                                        </p>
                                    </div>

                                </div>
                                <div>

                                    <h6 class="leftSubHeadings">
                                        LANGUAGES
                                    </h6>

                                    <div class="leftText">
                                        <p class="lang-select flex">
                                          Hindi<span>100%</span>
                                        </p>
                                        <p class="lang-select flex">
                                          English<span>100%</span>
                                        </p>
                                    </div>

                                </div>

                                <div>

                                    <h6 class="leftSubHeadings">
                                        SKILLS
                                    </h6>

                                    <div class="leftText">
                                        <span class="lang-select flex">
                                          React, Vue js, Angular 
                                      </span>
                                    </div>

                                </div>
                                

                            </div>
                        </div>
                    </div>

                    <div class="rightDetails">
                        <div>
                            <div>
                               <div>
                                   <div>
                                        <h2 class="rightHeadings">
                                          WORK EXPERIENCE
                                        </h2>
                                   </div>
                               </div>

                               <div>
                                   <div>
                                    <div>
                                          <div>
                                              <h6 class="rightSubHeadingsM">
                                                  <span>
                                                      10/2021 - 10/2022
                                                  </span>
                                              </h6>

                                              <p  class="sumText">
                                                  <span>
                                                      Web Developer<br/> 
                                                      Nexgen Innovators<br/>Dwarka More, Delhi <br/><br />
                                                      I have done many projects while studying here<br/><br />
                                                  </span>
                                              </p>
                                          </div>
                                     </div>    
                                   </div>
                               </div>
                            </div>
                        </div>

                        <div>
                            <div class="sectionRow">
                                <div>
                                    <div>
                                        <h2 class="rightHeadings">
                                            EDUCATION
                                        </h2>
                                    </div>
                                </div>

                                <div>
                                    <div>
                                        <div>
                                            <div>
                                                <h6 class="rightSubHeadingsM">
                                                    <span>
                                                        10/2021 - 10/2022
                                                    </span>
                                                </h6>

                                                <p class="sumText">
                                                    <span>
                                                        BCA<br/> 
                                                        IITM<br/>Janakpuri, Delhi <br/><br />
                                                        I have done many projects in college<br/><br />
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div >
                                <div>
                                    <div>
                                        <div>
                                            <div>
                                                
                                                <p class="lastSum">

                                                     <span>
                                                        As part of my high-capacity demonstrated roles, leading complex<br />
                                                        processes while finding a solution real-time issues and providing<br />
                                                        professional support and advice to a variety of factors within and<br />
                                                        outside the organization.
                                                    </span>
                                                </p>
                                                <p class="lastSum">
                                                    <span>
                                                        I was also required to have high technical skill and creativity in<br />
                                                        solving complex problems.
                                                    </span>
                                                </p>

                                                <p class="lastSum">
                                                    <span>
                                                        I am looking for positions of a technical and professional nature in<br />
                                                        order to express my skills in the best way.<br />
                                                        Recommendations will be accepted upon request.
                                                    </span>
                                                </p> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div >
                          <div class="sectionRow">
                              <div>
                                  <div>
                                      <h2 class="rightHeadings">
                                          Projects 
                                      </h2>
                                  </div>
                              </div>

                              <div>
                                  <div>
                                      <div>
                                          <div>
                                              I have created many projects
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>


    <script defer type="text/javascript">
    
    const handlePrint = () =>{
            //event.preventDefault();
            let element = document.getElementById('resume');
           
            // var opt = {
            //           margin: [0, 0, 0, 0],
            //           filename: `Test-CV.pdf`,
            //           image: { type: 'jpeg', quality: .98 },
            //           html2canvas: {
            //             dpi: 192,
            //             scale:4,
            //             letterRendering: true,
            //             useCORS: true
            //           },
            //           jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
            //         };

            // var worker = html2pdf().set(opt).from(element).toPdf().save();

            var opt = {
            margin: [0, 0, 0, 0],
            filename: `TestCV.pdf`,
            image: { type: 'png', quality: 1 },
            html2canvas: {
              dpi: 300,
              scale:4,
              width: 880,
              // height:1000,
              letterRendering: true,
              useCORS: true
            },
            jsPDF: { 
                      unit: 'pt', 
                      format: 'a4', 
                      orientation: 'portrait', 
                      // autoSize : true, 
                      // fontSize: 40 
                  }
          };
            html2pdf(element,opt);
        }

        var $el = document.getElementById("resizable-resume");
        var elHeight = $el.offsetHeight;
        var elWidth = $el.offsetWidth;

        var $wrapper = document.getElementById("scaleable-wrapper");

        function doResize(event, ui) {
          
          var scale, origin;
            
          scale = Math.min(
            ui.size.width / elWidth,    
            ui.size.height / elHeight
          );
          
          $el.style.transform = "translate(-50%, -50%) " + "scale(" + scale + ")";
          
        }

        var starterData = { 
          //var $wrapper = document.getElementById("scaleable-wrapper");
          size: {
            width: $wrapper.offsetWidth,
            height: $wrapper.offsetHeight
          }
        }

        window.addEventListener('resize', (e) => {
          //var wrapper = document.getElementById("scaleable-wrapper");
          const wprW = $wrapper.offsetWidth;
          const wprH = $wrapper.offsetHeight;
          const ui = {
            size: { width: wprW, height: wprH }
          }
          doResize(e, ui)
        });

        doResize(null, starterData);

    </script>
    </body>
</html>
