// import "./bootstrap";

// // function loadCommentes() {
// //     // const response =  fetch(
// //     //     "http://milliondollar-ideas.test:8080/posts/comments"
// //     // );

// //     // const data = await response.json();

// //     // return data;

// //     //create XMLHttpRequest object
// // 	let xhr = new XMLHttpRequest();
// // 	//initialize the request
// // 	xhr.open('POST', 'http://localhost/TaskBoard/get', true);
// // 	//spicifie type of data reseved by the server
// // 	xhr.setRequestHeader('Content-Type', 'application/json');
// // 	//spicifie type of response
// // 	xhr.responseType = 'json';
// // 	// send data to server
// // 	xhr.send(JSON.stringify({ id: userId }));

// // }

// // document.addEventListener("DOMContentLoaded", () => {
// //     loadCommentes();
// // });


// function getCommentes(url, callback) {
//     var xhr = new XMLHttpRequest();
//     xhr.responseType = "json";
//     xhr.onreadystatechange = function () {
//         if (xhr.readyState === 4 && xhr.status === 200) {
//             callback(xhr.response);
//         }
//     };
//     xhr.open("GET", url, true);
//     xhr.send();
// }

// document.addEventListener("DOMContentLoaded", () => {
//     getCommentes(
//         "http://milliondollar-ideas.test:8080/posts/comments",
//         function (response) {
//           const json = JSON.stringify(response);
//           console.log(json);
//         }
//     );
// });