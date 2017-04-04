// media.js

// We want to be able to play 4 different songs for each button
function playSong1() {
  // grab the audio tag
  var audioTag = document.querySelector('#song1');

  // grab the button
  var button = document.querySelector('#play1');

  // grab the icon
  var icon = document.querySelector('#play1 i');

  if(icon.className === 'glyphicon glyphicon-play') {
    // if the button is a play button
    // onclick, play the audioTag
    // make the button a pause button
    audioTag.play();
    icon.className = 'glyphicon glyphicon-pause';
    button.className = 'btn btn-danger';
  } else {
    // if the button is a pause button
    // onclick, pause the audioTag
    // make the button a play button
    audioTag.pause();
    icon.className = 'glyphicon glyphicon-play';
    button.className = 'btn btn-success';
  }
}

function playSong2() {
  // grab the audio tag
  var audioTag = document.querySelector('#song2');

  // grab the button
  var button = document.querySelector('#play2');

  // grab the icon
  var icon = document.querySelector('#play2 i');

  if(icon.className === 'glyphicon glyphicon-play') {
    // if the button is a play button
    // onclick, play the audioTag
    // make the button a pause button
    audioTag.play();
    icon.className = 'glyphicon glyphicon-pause';
  } else {
    // if the button is a pause button
    // onclick, pause the audioTag
    // make the button a play button
    audioTag.pause();
    icon.className = 'glyphicon glyphicon-play';
  }
}

function playSong3() {
  // grab the audio tag
  var audioTag = document.querySelector('#song3');

  // grab the button
  var button = document.querySelector('#play3');

  // grab the icon
  var icon = document.querySelector('#play3 i');

  if(icon.className === 'glyphicon glyphicon-play') {
    // if the button is a play button
    // onclick, play the audioTag
    // make the button a pause button
    audioTag.play();
    icon.className = 'glyphicon glyphicon-pause';
  } else {
    // if the button is a pause button
    // onclick, pause the audioTag
    // make the button a play button
    audioTag.pause();
    icon.className = 'glyphicon glyphicon-play';
  }
}

function playSong4() {
  // grab the audio tag
  var audioTag = document.querySelector('#song4');

  // grab the button
  var button = document.querySelector('#play4');

  // grab the icon
  var icon = document.querySelector('#play4 i');

  if(icon.className === 'glyphicon glyphicon-play') {
    // if the button is a play button
    // onclick, play the audioTag
    // make the button a pause button
    audioTag.play();
    icon.className = 'glyphicon glyphicon-pause';
  } else {
    // if the button is a pause button
    // onclick, pause the audioTag
    // make the button a play button
    audioTag.pause();
    icon.className = 'glyphicon glyphicon-play';
  }
}
