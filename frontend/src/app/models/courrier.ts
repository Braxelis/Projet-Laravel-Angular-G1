export interface Courrier {
  id?: number;
  type: 'entrant' | 'sortant';
  date: string;
  objet: string;
  service: string;
  personne: string; // expéditeur ou destinataire
  pieceJointe?: File;
}
