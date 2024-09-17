const express = require(`express`)
const app = express()
const fs = require(`fs`);

app.use(express.json())
app.use(express.urlencoded({ extended: true }))
const path = require('path')
app.use(express.static(path.join(__dirname, 'public')))
app.get('/favicon.ico', (req, res) => res.status(204));

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


app.get(`/add`, (req, res)=>{
  const filePath = path.join(__dirname, `public`, `testform.html`)
  res.sendFile(filePath);
})

app.get('/jeep', async (req, res) => {
  var data = await readFile(`./data/jeep.json`);
  res.send(JSON.parse(data));
  });

app.post('/jeep', async (req, res) => { 
    var oldData =  await readFile(`./data/jeep.json`)
    var newData =  await JSON.parse(oldData)
    newData.push(req.body)
    const jsonString = JSON.stringify(newData);
    await fs.writeFile('./data/jeep.json', jsonString, err => {
      if (err) {
          console.log('Error writing file', err)
      } else {
          console.log('Successfully wrote file')
      }
    });
    res.send(jsonString);
});

app.post('/delete', async (req, res) => { 
  var oldData = await readFile(`./data/jeep.json`)
  var newData = await JSON.parse(oldData)
  let index = req.body.index
  console.log(`Index: ${index}`)
  console.log(`JSON: ${newData}`)
  newData.splice(index, 1)
  const jsonString = JSON.stringify(newData);
    await fs.writeFile('./data/jeep.json', jsonString, err => {
      if (err) {
          console.log('Error writing file', err)
      } else {
          console.log('Successfully wrote file')
      }
    });
    res.send(jsonString);
});

//Start up the server on port 3000.
var port = 80
app.listen(port, ()=>{
    console.log(`Server Running at ${port}`)
})