
const express = require('express')
const path = require('path')
const cors = require("cors");

const axios = require('axios')

const  i18next =  require('i18next');

const engLang = require('./locales/en/translation.json');
const frLang = require('./locales/fr/translation.json');
const arLang = require('./locales/ar/translation.json');

let ejs = require("ejs");

const bodyParser = require('body-parser');

var corsOptions = {
    origin: "http://localhost:3000"
  };



var pdf = require("pdf-creator-node");
var fs = require("fs");
const Downloader = require("nodejs-file-downloader");
// Read HTML Template
var html = fs.readFileSync(path.join(__dirname,'templates/cv/template.html'), "utf8");



const app = express()




app.use( express.static( "public" ) );


app.use(cors(corsOptions));

app.use(bodyParser.urlencoded({ extended: false }))

app.use(bodyParser.json())


var options = {
    format: "A4",
    orientation: "portrait"
};



  
app.get('/', (req, res) => {
  
  ejs.renderFile('./test.ejs', { 'fun': i18next.t }, {}, (err, str) => {
    // str => Rendered HTML string
    if (err) {
     console.log(err)
    } else {
     console.log(str)
    }
   })
   res.send(i18next.t('language'))

})



app.get('/view', function(req, res){
  res.sendFile(path.join(__dirname,'templates/cv/template.html'));
})



function hexToRgb(hex) {
  var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
  return result ? {
    r: parseInt(result[1], 16),
    g: parseInt(result[2], 16),
    b: parseInt(result[3], 16)
  } : null;
}




app.post('/download', async function (req, response){

  const formData = req.body;
  langCode = formData.ajaxData.currentLanguageCode;
  i18next.init({
    lng: langCode, // if you're using a language detector, do not define the lng option
    debug: false,
    resources: {
      en: {
        translation: engLang
      },
      fr:{
        translation: frLang
      },
      ar:{
        translation: arLang
      }
    }
  });

  let templateId = formData.ajaxData.template.template_id;

  const cvRes = await axios.post('http://resume-server-chukde.com/api/cv/get/check-details', 
            {cv_id:formData.ajaxData.cv_id},
            {  headers: {
              Authorization: formData.auth ? `Bearer ${formData.auth}` : '',
              'Content-Type': 'application/json'
          },}
            )
            // console.log(cvRes.data.payload.cvData);
        
const cvData = cvRes.data.payload.cvData;

const color = cvData.templateData.color;

if(color) {
  let rgb = hexToRgb(color);
  cvData.templateData.secondColor = `rgb(${rgb?.r+26},${rgb?.g+30},${rgb?.b+33})`
}


// templateId = 3;

let dir = 'ltr';

if(langCode == 'ar') {
  dir = 'rtl';
}

let template = `template-${templateId}`;

// if(dir == 'rtl' ) {
//   console.log(dir)
//   template = `template-RTL-${templateId}`;
// }

ejs.renderFile(path.join(__dirname, 'templates','cv',`${template}.ejs`),
 {
  cvData:cvData,
  profileInfo:cvData.profileInfo,
  experience:cvData.experience,
  education:cvData.education,
  skills:cvData.skills,
  languages:cvData.languages,
  templateData:cvData.templateData,
  customSections:cvData.customSections,
  objective:cvData.objective,
  transalate:i18next.t,
  dir

}, (err, str) => {
  // str => Rendered HTML string
  if (err) {
   console.log(err)
  } else {


    // response.send(str);
    // return;
      var document = {
        html: str,
        data: {
          
        },
        path: "./output.pdf",
        type: "",
      };


    pdf
    .create(document, options)
    .then((res) => {
    const file = path.join(__dirname,'output.pdf');
    // res.download(file,); // Set disposition and send it.

    response.download(file, 'test', (err) => {
    if (err) {
      response.status(500).send({
        message: "Could not download the file. " + err,
      });
    }
    });
    })
    .catch((error) => {
    console.error(error);
    });
  
  }
 })
        
  });

  const PORT = process.env.PORT || 8080;

  app.listen(PORT, () => {
    console.log(`Example app listening on port ${port}`)
  })