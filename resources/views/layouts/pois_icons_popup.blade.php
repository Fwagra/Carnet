<dialog class="mdl-dialog icon-choose-dialog">
  <h4 class="mdl-dialog__title">{!! trans('icon.title_popup') !!}</h4>
  <div class="mdl-dialog__content">
      <p class="popup-message">
          {!! trans('icon.message_popup') !!}
      </p>
          <ul class="mdl-list icon-list">
            <li class="mdl-list__item" data-icon="place">
              <span class="mdl-list__item-primary-content">
                  <i class="material-icons icon-align">place</i>
                  {!! trans('icon.place') !!}
              </span>
            </li>
            <li class="mdl-list__item" data-icon="location_city">
              <span class="mdl-list__item-primary-content">
                  <i class="material-icons icon-align">location_city</i>
                  {!! trans('icon.location_city') !!}
              </span>
            </li>
            <li class="mdl-list__item" data-icon="terrain">
              <span class="mdl-list__item-primary-content">
                  <i class="material-icons icon-align">terrain</i>
                  {!! trans('icon.terrain') !!}
              </span>
            </li>
            <li class="mdl-list__item" data-icon="account_balance">
              <span class="mdl-list__item-primary-content">
                  <i class="material-icons icon-align">account_balance</i>
                  {!! trans('icon.account_balance') !!}
              </span>
            </li>
          </ul>
  </div>
  <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
    <button type="button" class="mdl-button confirm-btn">{!! trans('icon.confirm') !!}</button>
    <button type="button" class="mdl-button close">{!! trans('icon.cancel_btn') !!}</button>
  </div>
</dialog>
