function submitDocuments() {
    const officersAdvisers = document.getElementById('officers-advisers').files[0];
    const membersGoodStanding = document.getElementById('members-good-standing').files[0];
    const constitutionBylaws = document.getElementById('constitution-bylaws').files[0];
  
    if (!officersAdvisers || !membersGoodStanding || !constitutionBylaws) {
      alert('Please upload all required documents.');
      return;
    }
  
    const formData = new FormData();
    formData.append('officersAdvisers', officersAdvisers);
    formData.append('membersGoodStanding', membersGoodStanding);
    formData.append('constitutionBylaws', constitutionBylaws);
  
    fetch('upload-endpoint', {
      method: 'POST',
      body: formData,
    })
    .then(response => response.json())
    .then(data => {
      alert('Documents uploaded successfully!');
    })
    .catch(error => {
      console.error('Error uploading documents:', error);
      alert('Error uploading documents. Please try again.');
    });
  }