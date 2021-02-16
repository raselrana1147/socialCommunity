/*----------------
    POPUPS 
----------------*/
app.plugins.createPopup({
  container: '.popup-video',
  trigger: '.popup-video-trigger',
  sticky: true,
  overlay: {
    color: '21, 21, 31',
    opacity: .96
  },
  animation: {
    type: 'translate-in-fade',
    speed: .3,
    translateOffset: 40
  }
});

app.plugins.createPopup({
  container: '.popup-picture',
  trigger: '.popup-picture-trigger',
  sticky: true,
  overlay: {
    color: '21, 21, 31',
    opacity: .96
  },
  animation: {
    type: 'translate-in-fade',
    speed: .3,
    translateOffset: 40
  }
});

app.plugins.createPopup({
  container: '.popup-album-creation',
  trigger: '.popup-album-creation-trigger',
  overlay: {
    color: '21, 21, 31',
    opacity: .96
  },
  animation: {
    type: 'translate-in-fade',
    speed: .3,
    translateOffset: 40
  }
});

app.plugins.createPopup({
  container: '.popup-event-creation',
  trigger: '.popup-event-creation-trigger',
  overlay: {
    color: '21, 21, 31',
    opacity: .96
  },
  animation: {
    type: 'translate-in-fade',
    speed: .3,
    translateOffset: 40
  }
});

app.plugins.createPopup({
  container: '.popup-event-information',
  trigger: '.popup-event-information-trigger',
  overlay: {
    color: '21, 21, 31',
    opacity: .96
  },
  animation: {
    type: 'translate-in-fade',
    speed: .3,
    translateOffset: 40
  }
});

app.plugins.createPopup({
  container: '.popup-manage-group',
  trigger: '.popup-manage-group-trigger',
  overlay: {
    color: '21, 21, 31',
    opacity: .96
  },
  animation: {
    type: 'translate-in-fade',
    speed: .3,
    translateOffset: 40
  }
});

app.plugins.createPopup({
  container: '.popup-edit-item',
  trigger: '.popup-edit-item-trigger',
  overlay: {
    color: '21, 21, 31',
    opacity: .96
  },
  animation: {
    type: 'translate-in-fade',
    speed: .3,
    translateOffset: 40
  }
});

app.plugins.createPopup({
    container: '.popup-manage-item',
    trigger: '.popup-manage-item-trigger',
    overlay: {
        color: '21, 21, 31',
        opacity: .96
    },
    animation: {
        type: 'translate-in-fade',
        speed: .3,
        translateOffset: 40
    }
});






app.plugins.createPopup({
  container: '.popup-review',
  trigger: '.popup-review-trigger',
  overlay: {
    color: '21, 21, 31',
    opacity: .96
  },
  animation: {
    type: 'translate-in-fade',
    speed: .3,
    translateOffset: 40
  }
});


/*
|==================================================================================================
|All the modals from here
|==================================================================================================
*/
/* Modal for the apply for affiliate member*/
app.plugins.createPopup({
  container: '.applyForAffilaite',
  trigger: '.apply-affialte-member',
  overlay: {
    color: '21, 21, 31',
    opacity: .96
  },
  animation: {
    type: 'translate-in-fade',
    speed: .3,
    translateOffset: 40
  }
});
/*====end===*/


//comment modal 
app.plugins.createPopup({
    container: '.comment-modal-container',
    trigger: '.comment-modal-show-up',
    overlay: {
        color: '21, 21, 31',
        opacity: .96
    },
    animation: {
        type: 'translate-in-fade',
        speed: .3,
        translateOffset: 40
    }
});
//end

//comment modal fnd
app.plugins.createPopup({
    container: '.comment-modal-container-fnd',
    trigger: '.comment-modal-show-up-fnd',
    overlay: {
        color: '21, 21, 31',
        opacity: .96
    },
    animation: {
        type: 'translate-in-fade',
        speed: .3,
        translateOffset: 40
    }
});
//end

//comment modal user
app.plugins.createPopup({
    container: '.comment-modal-container-user',
    trigger: '.comment-modal-show-up-user',
    overlay: {
        color: '21, 21, 31',
        opacity: .96
    },
    animation: {
        type: 'translate-in-fade',
        speed: .3,
        translateOffset: 40
    }
});
//end

app.plugins.createPopup({
    container: '.comment-modal-container-single',
    trigger: '.comment-modal-show-up-single',
    overlay: {
        color: '21, 21, 31',
        opacity: .96
    },
    animation: {
        type: 'translate-in-fade',
        speed: .3,
        translateOffset: 40
    }
});
//end



/* Modal for the change user avatar*/
app.plugins.createPopup({
  container: '.changeAvatarImage',
  trigger: '.change-user-avatar',
  overlay: {
    color: '21, 21, 31',
    opacity: .96
  },
  animation: {
    type: 'translate-in-fade',
    speed: .3,
    translateOffset: 40
  }
});
/*====end===*/


/* Modal for the change user avatar*/
app.plugins.createPopup({
  container: '.changeCoverPhoto',
  trigger: '.change-user-cover-photo',
  overlay: {
    color: '21, 21, 31',
    opacity: .96
  },
  animation: {
    type: 'translate-in-fade',
    speed: .3,
    translateOffset: 40
  }
});
/*====end===*/


/* Modal for convert credit*/
app.plugins.createPopup({
  container: '.convertCreditToDoller',
  trigger: '.convert-credit-to-doller',
  overlay: {
    color: '21, 21, 31',
    opacity: .96
  },
  animation: {
    type: 'translate-in-fade',
    speed: .3,
    translateOffset: 40
  }
});
/*====end===*/

/* Modal for withmoney*/
app.plugins.createPopup({
  container: '.withdrawBalance',
  trigger: '.withdraw-balance',
  overlay: {
    color: '21, 21, 31',
    opacity: .96
  },
  animation: {
    type: 'translate-in-fade',
    speed: .3,
    translateOffset: 40
  }
});
/*====end===*/

/*--------------------------
    PICTURE POPUP RESIZE
--------------------------*/
app.querySelector('.popup-picture', function (el) {
  const popup = el[0],
        widgetBoxScrollable = popup.querySelector('.widget-box-scrollable'),
        postCommentForm = popup.querySelector('.post-comment-form');

  const updateWidgetBoxScrollableDimensions = function () {
    widgetBoxScrollable.style.height = `${popup.offsetHeight - postCommentForm.offsetHeight}px`;
  };

  updateWidgetBoxScrollableDimensions();
  window.addEventListener('resize', updateWidgetBoxScrollableDimensions);
});