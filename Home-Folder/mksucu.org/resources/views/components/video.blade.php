    <section>
            <div class="video-container" id="video-container">
              <div class="playback-animation" id="playback-animation">
                <svg class="playback-icons">
                  <use class="hidden" href="#play-icon"></use>
                  <use href="#pause"></use>
                </svg>
              </div>
        
              <video controls class="eleso-video" id="video-video" preload="metadata" poster="{{ $poster }}" >
                <source src="{{ $source }}" type="video/mp4">
              </video>
        
              <div class="video-controls hidden" id="video-controls">
                <div class="video-progress">
                  <progress id="video-progress-bar" value="0" min="0"></progress>
                  <input class="seek" id="seek" value="0" min="0" type="range" step="1">
                  <div class="seek-tooltip" id="seek-tooltip">00:00</div>
                </div>
        
                <div class="bottom-controls">
                  <div class="left-controls">
                    <button data-title="Play (k)" id="play">
                      <svg class="playback-icons">
                        <use href="#play-icon"></use>
                        <use class="hidden" href="#pause"></use>
                      </svg>
                    </button>
        
                    <div class="volume-controls">
                      <button data-title="Mute (m)" class="volume-button" id="volume-button">
                        <svg>
                          <use class="hidden" href="#volume-mute"></use>
                          <use class="hidden" href="#volume-low"></use>
                          <use href="#volume-high"></use>
                        </svg>
                      </button>
        
                      <input class="volume" id="volume" value="1"
                      data-mute="0.5" type="range" max="1" min="0" step="0.01">
                    </div>
        
                    <div class="time">
                      <time id="time-elapsed">00:00</time>
                      <span> / </span>
                      <time id="duration">00:00</time>
                    </div>
                  </div>
        
                  <div class="right-controls">
                    <button data-title="PIP (p)" class="pip-button" id="pip-button">
                      <svg>
                        <use href="#pip"></use>
                      </svg>
                    </button>
                    <button data-title="Full screen (f)" class="fullscreen-button" id="fullscreen-button">
                      <svg>
                        <use href="#fullscreen"></use>
                        <use href="#fullscreen-exit" class="hidden"></use>
                      </svg>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </section>
