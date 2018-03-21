import Controller from '@ember/controller';
import { and, match, gte } from '@ember/object/computed';

export default Controller.extend({
  isValidEmail: match('email', /^.+@.+\..+$/),
  isLongEnoughText: gte('message.length', 5),
  isValid: and('isValidEmail', 'isLongEnoughText'),
  feedback: '',

  actions: {
    sendMessage() {
      const email = this.get('email'),
            message = this.get('message');
      const newContact = this.store.createRecord('contact', { email, message });

      newContact.save().then(response => {
        this.set('feedback', 'We got your message and we’ll get in touch soon');
        this.set('email', '');
        this.set('message', '');
      });
    }
  }
});
