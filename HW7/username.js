function get_username() {
  const cookie = `; ${document.cookie}`;
  const parts = cookie.split(`; username=`);
  if (parts.length === 2) return parts[1].split(';')[0];
  else {
      return "";
  }
}