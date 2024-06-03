import { initializeApp } from "firebase/app";
import {
  getAuth,
  createUserWithEmailAndPassword,
  updateProfile,
} from "firebase/auth";

const firebaseConfig = {
  apiKey: "AIzaSyAAD_dKXF83aTC4EJDNSJR8rciFPbTMLgM",
  authDomain: "random-72daf.firebaseapp.com",
  projectId: "random-72daf",
  storageBucket: "random-72daf.appspot.com",
  messagingSenderId: "989195938041",
  appId: "1:989195938041:web:c1eee633f5c8db7f821a28",
};

const app = initializeApp(firebaseConfig);

document.addEventListener("DOMContentLoaded", function () {});

const signup = document.getElementById("form_signup");
const email = document.getElementById("signup_email");
const password = document.getElementById("password");
const signupsubmit = document.getElementById("signup_submit");

signupsubmit.addEventListener("click", () => {
  console.log("working");
});

signup.addEventListener("submit", (event) => {
  event.preventDefault();
  console.log("Form submitted");
  console.log(email.value);

  const auth = getAuth(app);
  const emailValue = email.value;
  const passwordValue = password.value;

  createUserWithEmailAndPassword(auth, emailValue, passwordValue)
    .then((userCredential) => {
      const user = userCredential.user;

      updateProfile(user, {
        displayName: "John Doe",
      })
        .then(() => {
          console.log("Profile updated!");
        })
        .catch((error) => {
          console.error("Error updating profile:", error);
        });
    })
    .catch((error) => {
      const errorMessage = error.message;
      console.log(errorMessage);
    });
});
