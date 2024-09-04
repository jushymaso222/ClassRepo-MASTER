const express = require('express')
const app = express()

var hbs = require('hbs')
hbs.registerPartials(__dirname + '/views/partials', function (err) {});
app.set('view engine', 'hbs');

app.get("/", function (req, res) {
    res.sendFile(`${__dirname}/index.html`)
})

app.get("/starbucks", function (req, res) {
    res.sendFile(`${__dirname}/stuff.json`)
})

app.get("/test/:animal", function (req, res) {
    res.send(req.params)
})

app.get("/page/:name", function (req, res) {
    res.render(`page.hbs`, {name:req.params.name})
})

app.listen(3000, (e) => {
    console.log('Running on localhost:3000')
})