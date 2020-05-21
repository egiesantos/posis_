function loader(command, message)
{
  if(command == 'show')
  {
    $('.loader').show();

    $('#loader-message').text(message);
  }
  else
  {
    setTimeout(function(){

    $('.loader').fadeOut();

    },100);
  }
}