'user strict';

var starRating = (function() {

  var starRating = function(args) {
    var self = this;

    self.container = jQuery('#' + args.containerID);
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

      jQuery(`.` + self.starClass).on(`mouseover`, function() {
        var percentWidth = 20 * jQuery(this).data(`stars`);
        $(`.sr-star-bar` + self.containerId).css(`width`, percentWidth + `%`);
      });

      jQuery(`.` + self.starClass).on(`mouseout`, function() {
        jQuery(`.sr-star-bar` + self.containerID).css(`width`, self.ratingPercent);
      });

      jQuery(`.` + self.starClass).on(`click`, function() {
        self.newRating = jQuery(this).data(`stars`);
        var percentWidth = 20 * jQuery(this).data(`stars`);
        self.ratingPercent = percentWidth + `%`;
        $(`.sr-star-bar` + self.containerID).css(`width`, percentWidth + `%`);
        self.onRate();
      });

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
