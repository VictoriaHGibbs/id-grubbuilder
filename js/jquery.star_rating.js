'user strict';
$(function() {
var starRating = (function() {

  var starRating = function(args) {
    var self = this;

    self.container = $('#' + args.containerID);
    self.containerID = args.containerID;
    self.starClass = `sr-star` + self.containerID;
    self.starWidth = args.starWidth;
    self.starHeight = args.starHeight;
    self.containerWidth = args.starWidth * 5; //width of the container, 5 stars
    self.ratingPercent = args.ratingPercent;

    self.newRating = 0; // starting value for new rating
    self.canRate = args.canRate;

    self.draw();

    if (self.canRate) {
      if (typeof args.onRate !== 'undefined') {
        self.onRate = args.onRate;
      }

      $( '.' + self.starClass ).on( 'mouseover', function() { // mouseover a star
        // determine the percent width on mouseover of any star
        var percentWidth = 20 * $( this ).data( 'stars' );

        // set the percent width  of the star bar to the new mouseover width
        $( '.sr-star-bar' + self.containerId ).css( 'width', percentWidth + '%' );
      });

      $( '.' + self.starClass ).on( 'mouseout', function() { // mouseout of a star
        // return the star rating system percent to its previous percent on mouse out of any star
        $( '.sr-star-bar' + self.containerId ).css( 'width', self.ratingPercent );
      });

      $( '.' + self.starClass ).on( 'click', function() { // click on a star
        // ner rating set to the number of stars the user clicked on
        self.newRating = $( this ).data( 'stars' );

        // determine the percent width based on the stars clicked on
        var percentWidth = 20 * $( this ).data( 'stars' );

        // new rating percent is the number of stars clicked on
        self.ratingPercent = percentWidth + '%';

        // set new star bar percent width
        $( '.sr-star-bar' + self.containerId ).css( 'width', percentWidth + '%' );

        // run the on rate function passed in when the object was created
        self.onRate();
      } );	

    }
  };

  starRating.prototype.draw = function() {
    var self = this;
    var pointerStyle = ( self.canRate ? `cursor:pointer` : '');
    var starImg = `<img src="../../images/happystar.png" style="width: ${self.starWidth}px">`;

    var html = `<p style="display:inline;">Rating: </p>`

    html += `<div style="width:` + self.containerWidth + `px;height:` + self.starHeight + `px;position:relative;` + pointerStyle + `">`;
    html += `<div class="sr-star-bar` + self.containerWidth + `" style="width:` + self.ratingPercent + `;background:#f6b22b;height:100%;position:absolute;"></div>`;

    for (var i = 0; i < 5; i++) {
      var currStarStyle = `position:absolute;margin-left:` + ( self.starWidth * i ) + `px`;
      html += `<div class=` + self.starClass + `" data-stars="` + ( i + 1 ) + `" style="` +
        currStarStyle + `">` +
        starImg +
      `</div>`
    }

    html += `</div>`;

    self.container.html(html);
  };

  return starRating;

}) ();

$( function() {
  var rating = new starRating( {
    containerID: `star_rating`,
    starWidth: 30,
    starHeight: 30,
    ratingPercent: `50%`, //starting point for the rating
    canRate: true, // If user can rate or not
    onRate: function() {
      console.log(rating);
      alert(`You rated ${rating.newRating} stars`); // where server calls need to go to save stuff
    }
  } );
} );
});
