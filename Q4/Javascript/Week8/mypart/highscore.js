const express = require(`express`)
const app = express()
const fs = require(`fs`);
const hbs = require(`hbs`);
app.set('view engine', 'hbs');

app.use(express.json())
app.use(express.urlencoded({ extended: true }))
const path = require('path');
const { isNullOrUndefined } = require('util');
app.use(express.static(path.join(__dirname, 'public')))
app.get('/favicon.ico', (req, res) => res.status(204));
hbs.registerPartials(__dirname + '/views/partials', function (err) {});


const readFile = (path)=>{
  return new Promise(
    (resolve, reject)=>
    {
      fs.readFile(path, `utf8`, (err, data) => {
        if (err) {
         reject(err)
        }
        else
        {
          resolve(data)
        }
      });
    })
}

app.get(`/`, (req, res)=>{
  const filePath = path.join(__dirname, `public`, `index.html`)
  res.sendFile(filePath);
})

app.get('/hs', async (req, res) => {
  var data = await readFile(`./data/highscores.json`);
  res.send(JSON.parse(data));
  });

app.post('/hs', async (req, res) => { 
    var oldData =  await readFile(`./data/highscores.json`)
    var newData =  await JSON.parse(oldData)
    let newScore = req.body.score
    let newName = req.body.name
    
    values = newData["scores"]

    values.sort((a, b) => a - b)
    if (values[0][0] < newScore) {
      values[0][0] = newScore
      if (newName != null && newName != "") {
        values[0][1] = newName
      } else {
        values[0][1] = "name"
      }
    }

    newData["scores"] = values
    
    const jsonString = JSON.stringify(newData);
    await fs.writeFile('./data/highscores.json', jsonString, err => {
      if (err) {
          console.log('Error writing file', err)
      } else {
          console.log('Successfully wrote file')
      }
    });
    res.send(jsonString);
});

//Start up the server on port 3000.
var port = process.env.PORT || 80
app.listen(port, ()=>{
    console.log("Server Running at Localhost:80")
})