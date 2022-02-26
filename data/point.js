var pointJSON;

fetch('http://localhost/tesst/controllers/c_point/data.php')
  .then(res => res.json())
  .then(data => pointJSON = data)
  .then(() => console.log(pointJSON))